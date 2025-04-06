<?php

namespace Zoker\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\RegionResource;

class ListRegions extends BaseListRecords
{
    protected static string $resource = RegionResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
