<?php

namespace Zoker\Shop\Filament\Resources\PropertyResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\PropertyResource;

class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
