<?php

namespace Zoker\Shop\Filament\Resources\RegionResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Zoker\Shop\Filament\Resources\RegionResource;

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
