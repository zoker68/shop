<?php

namespace Zoker\Shop\Filament\Resources\UserGroupResource\Pages;

use Filament\Actions\CreateAction;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\UserGroupResource;

class ListUserGroups extends BaseListRecords
{
    protected static string $resource = UserGroupResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }
}
