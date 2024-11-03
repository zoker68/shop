<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\CategoryResource\Pages;
use Zoker\Shop\Models\Category;

class CategoryResource extends BaseResource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function presetForm(): void
    {
        $this->addFormFields(Category::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::category.admin.list.name'))
                ->sortable()
                ->searchable(),

            'parent.full_name' => TextColumn::make('parent.full_name')
                ->label(__('shop::category.admin.list.parent'))
                ->sortable(),

            'order' => TextColumn::make('order')
                ->hidden()
                ->sortable(),

            'published' => Tables\Columns\ToggleColumn::make('published')
                ->label(__('shop::category.admin.list.published'))
                ->toggleable(),

            'deleted_at' => TextColumn::make('deleted_at')
                ->label(__('shop::category.admin.list.deleted_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),

            'created_at' => TextColumn::make('created_at')
                ->label(__('shop::category.admin.list.created_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),

            'updated_at' => TextColumn::make('updated_at')
                ->label(__('shop::category.admin.list.updated_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ]);

        $this->setListReorderable('order');
        $this->setListDefaultSort('order');

        $this->addListActions([
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->addListBulkActions([
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
