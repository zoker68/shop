<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\ProductResource;

class ListProducts extends BaseListRecords
{
    protected static string $resource = ProductResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
