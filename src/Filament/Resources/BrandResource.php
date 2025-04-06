<?php

namespace Zoker\Shop\Filament\Resources;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
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
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\BrandResource\Pages;
use Zoker\Shop\Models\Brand;

class BrandResource extends BaseResource
{
    protected static ?string $model = Brand::class;

    protected static ?string $slug = 'brands';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function getModelLabel(): string
    {
        return __('shop::brand.admin.system.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('shop::brand.admin.system.plural_title');
    }

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
                ->disk(config('shop.disk'))
                ->imageEditor()
                ->directory('brands'),

            'published' => Toggle::make('published')
                ->label(__('shop::brand.admin.form.published')),
        ]);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::brand.admin.list.name'))
                ->searchable()
                ->sortable(),

            'logo' => ImageColumn::make('logo')
                ->label(__('shop::brand.admin.list.logo')),
            'published' => ToggleColumn::make('published')
                ->label(__('shop::brand.admin.form.published')),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
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

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->name;
    }
}
