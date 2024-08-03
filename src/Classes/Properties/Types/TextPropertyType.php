<?php

namespace Zoker\Shop\Classes\Properties\Types;

use Filament\Forms\Components\TextInput;
use Zoker\Shop\Enums\PropertyFilter;

class TextPropertyType extends BasePropertyType
{
    public function label(): string
    {
        return __('zoker.shop::product-filter.admin.text.label');
    }

    protected function getFilters(): array
    {
        return [
            PropertyFilter::None,
            PropertyFilter::Checkbox,
            PropertyFilter::Radio,
            PropertyFilter::Select,
        ];
    }

    public function getOptionsForm(): array
    {
        return [
            TextInput::make('value')
                ->label(__('zoker.shop::product-filter.admin.text.value'))
                ->required(),
        ];
    }

    public function hasOptions(): bool
    {
        return true;
    }
}
