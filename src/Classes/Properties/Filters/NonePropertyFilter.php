<?php

namespace Zoker68\Shop\Classes\Properties\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Zoker68\Shop\Enums\PropertyType;
use Zoker68\Shop\Models\Property;

class NonePropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('zoker68.shop::product-filter.admin.non_filter');
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
        throw new \Exception('Blade component for this filter is not exist');
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return fn (Builder $query) => $query;
    }
}