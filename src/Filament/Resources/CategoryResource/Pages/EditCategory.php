<?php

namespace Zoker68\Shop\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Zoker68\Shop\Filament\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
