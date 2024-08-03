<?php

namespace Zoker68\Shop\Contracts;

use Zoker68\Shop\Enums\PropertyType;
use Zoker68\Shop\Models\Property;

interface PropertyFilterInterface
{
    public function label(): string;

    public function hasOptions(): bool;

    public function filamentFormPropertySetValue(Property $property): array;

    public function getBladeComponentName(PropertyType $propertyType): string;

    public function getQueryForFilter($propertyId, $value): callable;
}
