<?php

namespace Zoker68\Shop\Filament\Resources\PaymentMethodResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker68\Shop\Filament\Resources\PaymentMethodResource;

class CreatePaymentMethod extends CreateRecord
{
    protected static string $resource = PaymentMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
