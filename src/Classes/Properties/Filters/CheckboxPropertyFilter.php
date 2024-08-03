<?php

namespace Zoker\Shop\Classes\Properties\Filters;

use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

class CheckboxPropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('zoker.shop::product-filter.admin.checkbox');
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return (new SelectPropertyFilter)->filamentFormPropertySetValue($property);
    }

    public function getBladeComponentName(PropertyType $propertyType): string
    {
        if ($propertyType === PropertyType::Color) {
            return 'components.partials.properties.filters.color-checkbox';
        }

        return 'components.partials.properties.filters.checkbox';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            foreach ($value as $indexValue => $isSelected) {
                if ($isSelected) {
                    $query->orWhere(function ($query) use ($propertyId, $indexValue) {
                        $query->where('property_id', $propertyId)->where('index_value', $indexValue);
                    });
                }
            }
        };
    }
}
