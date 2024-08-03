<?php

namespace Zoker68\Shop\Filament\Resources\CountryResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\CountryResource;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
