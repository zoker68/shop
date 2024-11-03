<?php

namespace Zoker\Shop\Filament\Resources\CountryResource\RelationManagers;

use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Zoker\Shop\Classes\Bases\BaseRelationManager;
use Zoker\Shop\Models\Region;

class RegionsRelationManager extends BaseRelationManager
{
    protected static string $relationship = 'regions';

    public function presetForm(): void
    {
        $this->addFormFields(Region::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('name');

        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::region.admin.list.name')),

            'published' => ToggleColumn::make('published')
                ->label(__('shop::region.admin.list.published')),
        ]);

        $this->addListHeaderActions([
            'create' => CreateAction::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
        ]);
    }
}
