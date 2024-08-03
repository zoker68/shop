<?php

namespace Zoker68\Shop\Classes\Properties\Filters;

use Filament\Forms\Components\Select;
use Zoker68\Shop\Enums\PropertyType;
use Zoker68\Shop\Models\Property;

class SelectPropertyFilter extends BasePropertyFilter
{
    public function label(): string
    {
        return __('zoker68.shop::product-filter.admin.select');
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function filamentFormPropertySetValue(Property $property): array
    {
        return [
            Select::make('value')
                ->label('Value')
                ->options($this->getOptionsListWithStyling($property))
                ->searchable()
                ->when($property->type === PropertyType::Color, fn ($form) => $form->allowHtml()),
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
        return 'components.partials.properties.filters.select';
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return function ($query) use ($propertyId, $value) {
            $query->where('property_id', $propertyId)->where('index_value', $value);
        };
    }
}
