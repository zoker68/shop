<?php

namespace Zoker\Shop\Filament\Resources\BrandResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\BrandResource;

class EditBrand extends BaseEditRecord
{
    protected static string $resource = BrandResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delte' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
            'restore' => RestoreAction::make(),
        ]);
    }
}
