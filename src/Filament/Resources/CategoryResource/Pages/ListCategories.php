<?php

namespace Zoker68\Shop\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
