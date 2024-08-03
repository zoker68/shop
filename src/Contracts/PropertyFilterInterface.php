<?php

namespace Zoker\Shop\Contracts;

use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

interface PropertyFilterInterface
{
    public function label(): string;

    public function hasOptions(): bool;

    public function filamentFormPropertySetValue(Property $property): array;

    public function getBladeComponentName(PropertyType $propertyType): string;

    public function getQueryForFilter($propertyId, $value): callable;
}
