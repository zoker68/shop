<?php

namespace Zoker68\Shop\Filament\Resources\ShippingMethodResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\ShippingMethodResource;

class ListShippingMethods extends ListRecords
{
    protected static string $resource = ShippingMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}