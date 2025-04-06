<?php

namespace Zoker\Shop\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\CategoryResource;

class EditCategory extends BaseEditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => Actions\DeleteAction::make(),
        ]);
    }
}
