<?php

namespace Zoker\Shop\Filament\Resources\ShippingMethodResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\ShippingMethodResource;

class ListShippingMethods extends BaseListRecords
{
    protected static string $resource = ShippingMethodResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
