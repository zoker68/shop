<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\Resource;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class BaseResource extends Resource
{
    use Extendable;
    use ExtendableResource;
}
