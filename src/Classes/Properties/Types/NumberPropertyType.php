<?php

namespace Zoker\Shop\Classes\Properties\Types;

use Filament\Forms\Components\TextInput;
use Zoker\Shop\Enums\PropertyFilter;

class NumberPropertyType extends BasePropertyType
{
    public function label(): string
    {
        return __('shop::product-filter.admin.number.label');
    }

    protected function getFilters(): array
    {
        return [
            PropertyFilter::None,
            PropertyFilter::Checkbox,
            PropertyFilter::Radio,
            PropertyFilter::Select,
            PropertyFilter::Range,
        ];
    }

    public function getOptionsForm(): array
    {
        return [
            TextInput::make('value')
                ->numeric()
                ->label(__('shop::product-filter.admin.number.value'))
                ->required(),
        ];
    }

    public function hasOptions(): bool
    {
        return true;
    }
}
