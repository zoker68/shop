<?php

namespace Zoker\Shop\Filament\Resources\OrderStatusResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\OrderStatusResource;

class CreateOrderStatus extends CreateRecord
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
