<?php

namespace Zoker\Shop\Filament\Resources\UserResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\UserResource;

class ListUsers extends BaseListRecords
{
    protected static string $resource = UserResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
