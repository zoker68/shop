<?php

namespace Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;

use Filament\Actions\DeleteAction;
use Zoker\Shop\Classes\Bases\BaseEditRecord;
use Zoker\Shop\Filament\Resources\ProductQuestionResource;

class EditProductQuestion extends BaseEditRecord
{
    protected static string $resource = ProductQuestionResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'delete' => DeleteAction::make(),
        ]);
    }
}
