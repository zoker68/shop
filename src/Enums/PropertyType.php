<?php

namespace Zoker68\Shop\Enums;

use Zoker68\Shop\Classes\Properties\Types\BooleanPropertyType;
use Zoker68\Shop\Classes\Properties\Types\ColorPropertyType;
use Zoker68\Shop\Classes\Properties\Types\NumberPropertyType;
use Zoker68\Shop\Classes\Properties\Types\TextareaPropertyType;
use Zoker68\Shop\Classes\Properties\Types\TextPropertyType;
use Zoker68\Shop\Contracts\PropertyTypeInterface;

enum PropertyType: string
{
    case Text = 'text';
    case Textarea = 'textarea';
    case Number = 'number';
    case Boolean = 'boolean';
    case Color = 'color';

    public static function getOptions()
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->instance()->label();
        }

        return $options;
    }

    public function instance(): PropertyTypeInterface
    {
        return new (match ($this) {
            self::Text => TextPropertyType::class,
            self::Textarea => TextareaPropertyType::class,
            self::Number => NumberPropertyType::class,
            self::Boolean => BooleanPropertyType::class,
            self::Color => ColorPropertyType::class,
        });
    }

    public function getOptionsForm(): array
    {
        $type = $this->instance();
        if (! $type->hasOptions()) {
            return [];
        }

        return $type->getOptionsForm();
    }
}
