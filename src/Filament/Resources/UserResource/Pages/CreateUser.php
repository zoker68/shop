<?php

namespace Zoker\Shop\Filament\Resources\UserResource\Pages;

use Zoker\Shop\Classes\Bases\BaseCreateRecord;
use Zoker\Shop\Filament\Resources\UserResource;

class CreateUser extends BaseCreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['password_confirmation']);

        return $data;
    }
}
