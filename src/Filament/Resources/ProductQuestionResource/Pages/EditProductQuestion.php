<?php

namespace Zoker68\Shop\Filament\Resources\ProductQuestionResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Zoker68\Shop\Filament\Resources\ProductQuestionResource;

class EditProductQuestion extends EditRecord
{
    protected static string $resource = ProductQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
