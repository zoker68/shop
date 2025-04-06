<?php

namespace Zoker\Shop\Filament\Resources\OrderStatusResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\OrderStatusResource;

class ListOrderStatuses extends BaseListRecords
{
    protected static string $resource = OrderStatusResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
