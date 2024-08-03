<?php

namespace Zoker\Shop\Classes\Properties\Types;

use Zoker\Shop\Classes\Properties\Filters\SelectPropertyFilter;
use Zoker\Shop\Contracts\PropertyTypeInterface;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

abstract class BasePropertyType implements PropertyTypeInterface
{
    abstract protected function getFilters(): array;

    public function getFiltersWithLabel(): array
    {
        $options = [];
        foreach ($this->getFilters() as $filterType) {
            $options[$filterType->value] = $filterType->instance()->label();
        }

        return $options;
    }

    public function formSetValue(Property $property): array
    {
        if ($this->hasOptions() && ! empty($property->options)) {
            if ($property->type === PropertyType::Color) {
                return (new SelectPropertyFilter)->filamentFormPropertySetValue($property);
            }

            return $property->filter->instance()->filamentFormPropertySetValue($property);
        }
        if ($property->type === PropertyType::Boolean) {
            return PropertyType::Boolean->instance()->filamentFormPropertySetValue($property);
        }

        return $this->getOptionsForm();
    }

    public function getValueBladeComponentName(): string
    {
        return 'components.partials.properties.values.default';
    }
}
