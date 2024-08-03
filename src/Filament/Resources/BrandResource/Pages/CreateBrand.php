<?php

namespace Zoker68\Shop\Filament\Resources\BrandResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker68\Shop\Filament\Resources\BrandResource;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
