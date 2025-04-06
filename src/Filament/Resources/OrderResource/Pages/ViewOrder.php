<?php

namespace Zoker\Shop\Filament\Resources\OrderResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Zoker\Shop\Classes\Bases\BaseViewRecord;
use Zoker\Shop\Filament\Resources\OrderResource;

class ViewOrder extends BaseViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
            'restore' => RestoreAction::make(),
        ]);
    }
}
