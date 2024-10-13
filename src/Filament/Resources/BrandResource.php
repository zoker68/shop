<?php

namespace Zoker\Shop\Filament\Resources;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Resources\Resource;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\BrandResource\Pages;
use Zoker\Shop\Models\Brand;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class BrandResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = Brand::class;

    protected static ?string $slug = 'brands';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected function presetForm(): void
    {
        $this->addFormFields([
            'created_at' => Placeholder::make('created_at')
                ->label(__('shop::brand.admin.form.created_at'))
                ->content(fn (?Brand $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::brand.admin.form.updated_at'))
                ->content(fn (?Brand $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'name' => TextInput::make('name')
                ->label(__('shop::brand.admin.form.name'))
                ->required(),

            'slug' => TextInput::make('slug')
                ->label(__('shop::brand.admin.form.slug'))
                ->maxLength(255)
                ->rules([
                    fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                        if (Brand::where('slug', $value)->where('id', '!=', $get('id'))->exists()) {
                            $fail(__('shop::brand.admin.error.slug.exist'));
                        }
                    },
                ]),

            'logo' => FileUpload::make('logo')
                ->label(__('shop::brand.admin.form.logo'))
                ->image()
                ->imageEditor()
                ->directory('brands'),

            'published' => Toggle::make('published')
                ->label(__('shop::brand.admin.form.published')),
        ]);
    }

    public function presetTable(): void
    {
        $this->addTableColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::brand.admin.list.name'))
                ->searchable()
                ->sortable(),

            'logo' => ImageColumn::make('logo')
                ->label(__('shop::brand.admin.list.logo')),
            'published' => ToggleColumn::make('published')
                ->label(__('shop::brand.admin.form.published')),
        ]);

        $this->addTableFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addTableActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addTableBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ], self::ACTION_MAIN_GROUP);
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
