<?php

namespace Zoker68\Shop\Classes\Properties\Filters;

use Zoker68\Shop\Enums\PropertyType;
use Zoker68\Shop\Models\Property;

/**
 * Not in use
 */
class ColorPickerPropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('zoker68.shop::product-filter.admin.color_picker');
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
        return 'components.partials.properties.filters.color';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            $query->where('property_id', $propertyId)->where('index_value', $value);
        };
    }
}