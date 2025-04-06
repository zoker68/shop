<?php

namespace Zoker\Shop\Filament\Resources\OrderStatusResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\OrderStatusResource;

class EditOrderStatus extends BaseEditRecord
{
    protected static string $resource = OrderStatusResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
            'restore' => RestoreAction::make(),
        ]);
    }
}
