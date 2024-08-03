<?php

namespace Zoker68\Shop\Filament\Resources\UserResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Zoker68\Shop\Filament\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        }

        unset($data['password_confirmation']);

        return $data;
    }
}
