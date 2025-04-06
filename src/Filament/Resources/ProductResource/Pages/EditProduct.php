<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\ProductResource;

class EditProduct extends BaseEditRecord
{
    protected static string $resource = ProductResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
            'restore' => RestoreAction::make(),
        ]);
    }
}
