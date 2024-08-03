<?php

namespace Zoker68\Shop\Filament\Resources\SkladCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Zoker68\Shop\Filament\Resources\SkladCategoryResource;

class EditSkladCategory extends EditRecord
{
    protected static string $resource = SkladCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
