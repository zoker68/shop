<?php

namespace Zoker\Shop\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
