<?php

namespace Zoker68\Shop\Enums;

use Zoker68\Shop\Classes\Properties\Filters\CheckboxPropertyFilter;
use Zoker68\Shop\Classes\Properties\Filters\ColorPickerPropertyFilter;
use Zoker68\Shop\Classes\Properties\Filters\NonePropertyFilter;
use Zoker68\Shop\Classes\Properties\Filters\RadioPropertyFilter;
use Zoker68\Shop\Classes\Properties\Filters\RangePropertyFilter;
use Zoker68\Shop\Classes\Properties\Filters\SelectPropertyFilter;
use Zoker68\Shop\Contracts\PropertyFilterInterface;

enum PropertyFilter: string
{
    case None = 'none';
    case Range = 'range';
    case Checkbox = 'checkbox';
    case Radio = 'radio';
    case Select = 'select';
    case ColorPicker = 'colorpicker';

    public function instance(): PropertyFilterInterface
    {
        return new (match ($this) {
            self::None => NonePropertyFilter::class,
            self::Range => RangePropertyFilter::class,
            self::Checkbox => CheckboxPropertyFilter::class,
            self::Radio => RadioPropertyFilter::class,
            self::Select => SelectPropertyFilter::class,
            self::ColorPicker => ColorPickerPropertyFilter::class,
        });
    }

    public function getQueryForFilter($propertyId, $value): callable
    {
        return $this->instance()->getQueryForFilter($propertyId, $value);
    }
}
