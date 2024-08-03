<?php

namespace Zoker68\Shop\Filament\Resources\BrandResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\BrandResource;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
