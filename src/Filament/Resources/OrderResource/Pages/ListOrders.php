<?php

namespace Zoker\Shop\Filament\Resources\OrderResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Filament\Resources\OrderResource;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
