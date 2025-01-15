<?php

namespace Zoker\Shop\Classes\Properties\Filters;

use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

class RangePropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('shop::product-filter.admin.range');
    }

    public function hasOptions(): bool
    {
        return false;
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return [];
    }

    public function getBladeComponentName(PropertyType $propertyType): string
    {
        return 'shop::components.partials.properties.filters.range';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            $query->where('property_id', $propertyId)
                ->whereRaw('CAST(`index_value` AS SIGNED) BETWEEN ? AND ?', [$value['min'], $value['max']]);
        };
    }
}
