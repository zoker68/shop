<?php

namespace Zoker68\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Zoker68\Shop\Filament\Resources\RegionResource;

class EditRegion extends EditRecord
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
