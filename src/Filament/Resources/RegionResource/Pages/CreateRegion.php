<?php

namespace Zoker\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\RegionResource;

class CreateRegion extends CreateRecord
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
