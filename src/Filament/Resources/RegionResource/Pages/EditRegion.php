<?php

namespace Zoker\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Actions\DeleteAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\RegionResource;

class EditRegion extends BaseEditRecord
{
    protected static string $resource = RegionResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
        ]);
    }
}
