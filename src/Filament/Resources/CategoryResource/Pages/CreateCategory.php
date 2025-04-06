<?php

namespace Zoker\Shop\Filament\Resources\CategoryResource\Pages;

use Zoker\Shop\Classes\Bases\BaseCreateRecord;
use Zoker\Shop\Filament\Resources\CategoryResource;

class CreateCategory extends BaseCreateRecord
{
    protected static string $resource = CategoryResource::class;

    public static function setNavigationLabel(?string $navigationLabel): void
    {
        self::$navigationLabel = $navigationLabel;
    }
}
