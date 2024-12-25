<?php

namespace Zoker\Shop\Enums;

use Illuminate\Support\Str;

enum Permission: string
{
    case ACCESS_ADMIN_PANEL = 'admin_panel';

    public static function getOptions()
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }

        return $options;
    }

    public function label(): string
    {
        return Str::of($this->name)->replace('_', ' ')->title();
    }
}
