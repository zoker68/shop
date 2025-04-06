<?php

namespace Zoker\Shop\Filament\Resources\PropertyResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\PropertyResource;

class ListProperties extends BaseListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
