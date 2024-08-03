<?php

namespace Zoker68\Shop\Classes\Properties\Filters;

use Zoker68\Shop\Contracts\PropertyFilterInterface;

abstract class BasePropertyFilter implements PropertyFilterInterface
{
    public function hasOptions(): bool
    {
        return true;
    }
}
