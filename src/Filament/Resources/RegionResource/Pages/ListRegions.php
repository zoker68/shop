<?php

namespace Zoker68\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\RegionResource;

class ListRegions extends ListRecords
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
