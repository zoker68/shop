<?php

namespace Zoker\Shop\Filament\Resources\CategoryResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\CategoryResource;

class ListCategories extends BaseListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
