<?php

namespace Zoker\Shop\Classes\Properties\Filters;

use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

/**
 * Not in use
 */
class ColorPickerPropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('shop::product-filter.admin.color_picker');
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return [];
    }

    public function getBladeComponentName(PropertyType $propertyType): string
    {
        return 'shop::components.partials.properties.filters.color';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            $query->where('property_id', $propertyId)->where('index_value', $value);
        };
    }
}
