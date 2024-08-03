<?php

namespace Zoker\Shop\Classes\Properties\Filters;

use Zoker\Shop\Contracts\PropertyFilterInterface;

abstract class BasePropertyFilter implements PropertyFilterInterface
{
    public function hasOptions(): bool
    {
        return true;
    }
}
