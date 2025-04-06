<?php

namespace Zoker\Shop\Filament\Resources\UserResource\Pages;

use Filament\Actions\DeleteAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\UserResource;

class EditUser extends BaseEditRecord
{
    protected static string $resource = UserResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make()->requiresConfirmation(),
        ]);
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
