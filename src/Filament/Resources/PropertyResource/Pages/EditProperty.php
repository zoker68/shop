<?php

namespace Zoker\Shop\Filament\Resources\PropertyResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\PropertyResource;

class EditProperty extends BaseEditRecord
{
    protected static string $resource = PropertyResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
            'restore' => RestoreAction::make(),
        ]);
    }
}
