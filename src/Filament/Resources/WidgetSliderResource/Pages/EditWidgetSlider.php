<?php

namespace Zoker\Shop\Filament\Resources\WidgetSliderResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Zoker\Shop\Filament\Resources\WidgetSliderResource;

class EditWidgetSlider extends EditRecord
{
    protected static string $resource = WidgetSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
