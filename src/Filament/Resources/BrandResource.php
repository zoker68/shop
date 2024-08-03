<?php

namespace Zoker\Shop\Filament\Resources;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\BrandResource\Pages;
use Zoker\Shop\Models\Brand;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $slug = 'brands';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('created_at')
                    ->label(__('shop::brand.admin.form.created_at'))
                    ->content(fn (?Brand $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label(__('shop::brand.admin.form.updated_at'))
                    ->content(fn (?Brand $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                TextInput::make('name')
                    ->label(__('shop::brand.admin.form.name'))
                    ->required(),

                TextInput::make('slug')
                    ->label(__('shop::brand.admin.form.slug'))
                    ->maxLength(255)
                    ->rules([
                        fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            if (Brand::where('slug', $value)->where('id', '!=', $get('id'))->exists()) {
                                $fail(__('shop::brand.admin.error.slug.exist'));
                            }
                        },
                    ]),

                FileUpload::make('logo')
                    ->label(__('shop::brand.admin.form.logo'))
                    ->image()
                    ->imageEditor()
                    ->directory('brands'),

                Toggle::make('published')
                    ->label(__('shop::brand.admin.form.published')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('shop::brand.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('logo')
                    ->label(__('shop::brand.admin.list.logo')),
                ToggleColumn::make('published')
                    ->label(__('shop::brand.admin.form.published')),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
