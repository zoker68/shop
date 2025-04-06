<?php

namespace Zoker\Shop\Filament\Resources\PaymentMethodResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\PaymentMethodResource;

class ListPaymentMethods extends BaseListRecords
{
    protected static string $resource = PaymentMethodResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
