<?php

namespace Zoker\Shop\Filament\Resources\BrandResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\BrandResource;

class ListBrands extends BaseListRecords
{
    protected static string $resource = BrandResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
