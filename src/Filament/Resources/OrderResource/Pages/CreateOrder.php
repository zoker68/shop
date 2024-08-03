<?php

namespace Zoker\Shop\Filament\Resources\OrderResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\OrderResource;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
