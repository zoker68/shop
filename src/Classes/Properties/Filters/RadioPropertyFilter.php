<?php

namespace Zoker\Shop\Classes\Properties\Filters;

use Filament\Forms\Components\Radio;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

class RadioPropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('shop::product-filter.admin.radio');
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return [
            Radio::make('value')
                ->label('Value')
                ->options($property->getOptionsList()),
        ];
    }

    public function getOptionsListWithStyling(Property $property): array
    {
        if ($property->type === PropertyType::Color) {
            $options = [];
            foreach ($property->getOptionsList() as $value) {
                $value = substr($value, 0, 7);

                $options[$value] = "<span style='background-color: $value; padding: 4px 30px; border-radius: 4px; width: 100%;'>$value</span>";
            }

            return $options;
        }

        return $property->getOptionsList();
    }

    public function getBladeComponentName(PropertyType $propertyType): string
    {
        if ($propertyType === PropertyType::Color) {
            return 'components.partials.properties.filters.color-radio';
        }

        return 'components.partials.properties.filters.radio';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            $query->where('property_id', $propertyId)->where('index_value', $value);
        };
    }
}
