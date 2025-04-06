<?php

namespace Zoker\Shop\Filament\Resources\CountryResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\CountryResource;

class ListCountries extends BaseListRecords
{
    protected static string $resource = CountryResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
