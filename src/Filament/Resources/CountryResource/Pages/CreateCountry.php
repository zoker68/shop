<?php

namespace Zoker68\Shop\Filament\Resources\CountryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker68\Shop\Filament\Resources\CountryResource;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
