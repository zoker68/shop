<?php

namespace Zoker68\Shop\Filament\Resources\OrderStatusResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\OrderStatusResource;

class ListOrderStatuses extends ListRecords
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
