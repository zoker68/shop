<?php

namespace Zoker68\Shop\Classes\Properties\Types;

use Filament\Forms\Components\Textarea;
use Zoker68\Shop\Enums\PropertyFilter;

class TextareaPropertyType extends BasePropertyType
{
    public function label(): string
    {
        return __('zoker68.shop::product-filter.admin.textarea.label');
    }

    protected function getFilters(): array
    {
        return [
            PropertyFilter::None,
            PropertyFilter::Checkbox,
            PropertyFilter::Radio,
        ];
    }

    public function hasOptions(): bool
    {
        return false;
    }

    public function getOptionsForm(): array
    {
        return [
            Textarea::make('value')
                ->label(__('zoker68.shop::product-filter.admin.textarea.value'))
                ->required(),
        ];
    }
}