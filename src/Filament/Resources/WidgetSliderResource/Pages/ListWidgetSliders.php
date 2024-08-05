<?php

namespace Zoker\Shop\Filament\Resources\WidgetSliderResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Filament\Resources\WidgetSliderResource;

class ListWidgetSliders extends ListRecords
{
    protected static string $resource = WidgetSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
