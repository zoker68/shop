<?php

namespace Zoker68\Shop\Classes\Properties\Types;

use Filament\Forms\Components\ColorPicker;
use Zoker68\Shop\Enums\PropertyFilter;

class ColorPropertyType extends BasePropertyType
{
    public function label(): string
    {
        return __('zoker68.shop::product-filter.admin.color.label');
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
            ColorPicker::make('value')
                ->label(__('zoker68.shop::product-filter.admin.color.value'))
                ->required(),
        ];
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function getValueBladeComponentName(): string
    {
        return 'components.partials.properties.values.color';
    }
}
