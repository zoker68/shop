<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\ProductResource\Pages;
use Zoker\Shop\Filament\Resources\ProductResource\RelationManagers\CategoriesRelationManager;
use Zoker\Shop\Filament\Resources\ProductResource\RelationManagers\PropertiesRelationManager;
use Zoker\Shop\Filament\Resources\ProductResource\RelationManagers\QuestionsRelationManager;
use Zoker\Shop\Filament\Resources\ProductResource\RelationManagers\ReviewsRelationManager;
use Zoker\Shop\Models\Product;

class ProductResource extends BaseResource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'products';

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Products';

    protected function presetForm(): void
    {
        $this->setFormColumns(3);

        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::product.admin.form.name'))
                ->required()
                ->columnSpan(2),

            'slug' => TextInput::make('slug')
                ->label(__('shop::product.admin.form.slug'))
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            'description' => RichEditor::make('description')
                ->label(__('shop::product.admin.form.description'))
                ->columnSpan(2),

            'image' => FileUpload::make('image')
                ->label(__('shop::product.admin.form.image'))
                ->image()
                ->disk(config('shop.disk'))
                ->directory('products')
                ->imageEditor()
                ->imageEditorAspectRatios([null, '4:3', '16:9', '3:1', '1:1']),

            'stock' => TextInput::make('stock')
                ->label(__('shop::product.admin.form.stock'))
                ->required()
                ->integer()
                ->minValue(0),

            'price' => TextInput::make('price')
                ->label(__('shop::product.admin.form.price'))
                ->required()
                ->numeric()
                ->prefix(currency()->getPrefix())
                ->postfix(currency()->getSuffix())
                ->minValue(0)
                ->afterStateHydrated(fn ($state, $set) => $set('price', $state / (currency()->getSubunit()))),

            'brand_id' => Select::make('brand_id')
                ->columnStart(1)
                ->label(__('shop::product.admin.form.brand'))
                ->relationship('brand', 'name')
                ->searchable(),

            'published' => Toggle::make('published')
                ->label(__('shop::product.admin.form.published')),
        ]);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::product.admin.list.name'))
                ->searchable()
                ->sortable(),

            'categories.name' => TextColumn::make('categories.name')
                ->label(__('shop::product.admin.list.categories'))
                ->sortable()
                ->state(fn (Product $record) => $record->categories->pluck('full_name'))
                ->listWithLineBreaks(),

            'stock' => TextColumn::make('stock')
                ->label(__('shop::product.admin.list.stock')),

            'price' => TextColumn::make('price')
                ->money(currency()->getCurrency(), currency()->getSubunit())
                ->label(__('shop::product.admin.list.price')),

            'published' => ToggleColumn::make('published')
                ->label(__('shop::product.admin.list.published')),

        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ], self::ACTION_MAIN_GROUP);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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
        return ['name', 'foreign_id', 'slug'];
    }

    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,
            PropertiesRelationManager::class,
            QuestionsRelationManager::class,
            ReviewsRelationManager::class,
        ];
    }
}
