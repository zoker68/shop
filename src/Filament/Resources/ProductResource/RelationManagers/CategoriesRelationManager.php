<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Traits\Resources\ExtendableRelationManager;

class CategoriesRelationManager extends RelationManager
{
    use ExtendableRelationManager;

    protected static string $relationship = 'categories';

    public function presetForm(): void
    {
        $this->addFormFields(Category::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('name');

        $this->addListColumns([
            'name' => Tables\Columns\TextColumn::make('full_name'),

            'published' => Tables\Columns\IconColumn::make('published')
                ->boolean(),
        ]);

        $this->addListHeaderActions([
            'create' => Tables\Actions\CreateAction::make(),
            'attach' => Tables\Actions\AttachAction::make()
                ->preloadRecordSelect()
                ->multiple()
                ->recordTitle(fn ($record) => $record->full_name),
        ]);

        $this->addListBulkActions([
            'detach' => Tables\Actions\DetachBulkAction::make(),
        ]);

        $this->addListActions([
            'edit' => Tables\Actions\EditAction::make(),
            'detach' => Tables\Actions\DetachAction::make(),
        ]);
    }
}
