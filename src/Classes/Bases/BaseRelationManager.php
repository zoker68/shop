<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\RelationManagers\RelationManager;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendableRelationManager;

abstract class BaseRelationManager extends RelationManager
{
    use Extendable;
    use ExtendableRelationManager;
}
