<?php

namespace Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\ProductQuestionResource;

class CreateProductQuestion extends CreateRecord
{
    protected static string $resource = ProductQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
