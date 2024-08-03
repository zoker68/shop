<?php

namespace Zoker68\Shop\Filament\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker68\Shop\Filament\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public static function setNavigationLabel(?string $navigationLabel): void
    {
        self::$navigationLabel = $navigationLabel;
    }
}
