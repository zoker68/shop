<?php

namespace Zoker\Shop\Classes\Properties\Types;

use Filament\Forms\Components\Radio;
use Zoker\Shop\Enums\PropertyFilter;
use Zoker\Shop\Models\Property;

class BooleanPropertyType extends BasePropertyType
{
    public function getOptions(): array
    {
        return [
            0 => __('zoker.shop::product-filter.admin.boolean.0'),
            1 => __('zoker.shop::product-filter.admin.boolean.1'),
        ];
    }

    public function label(): string
    {
        return __('zoker.shop::product-filter.admin.boolean.label');
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

    public function hasOptions(): bool
    {
        return false;
    }

    public function getOptionsForm(): array
    {
        return [];
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return [
            Radio::make('value')
                ->label(__('zoker.shop::product-filter.admin.boolean.value'))
                ->options($this->getOptions()),
        ];
    }

    public function getOptionsForFilters(PropertyFilter $filter): array
    {
        $options = $this->getOptions();
        if ($filter == PropertyFilter::Radio) {
            $options['any'] = __('zoker.shop::product-filter.admin.boolean.any');
        }

        return $options;
    }
}
