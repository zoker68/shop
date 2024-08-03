<?php

namespace Zoker68\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker68\Shop\Filament\Resources\ProductResource;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
