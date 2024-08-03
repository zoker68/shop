<?php

namespace Zoker\Shop\Filament\Resources\CountryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\CountryResource;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
