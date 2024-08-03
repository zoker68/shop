<?php

namespace Zoker\Shop\Filament\Resources\ShippingMethodResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\ShippingMethodResource;

class CreateShippingMethod extends CreateRecord
{
    protected static string $resource = ShippingMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
