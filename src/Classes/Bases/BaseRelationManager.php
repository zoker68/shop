<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\RelationManagers\RelationManager;
use Zoker\Shop\Traits\Resources\ExtendableRelationManager;

abstract class BaseRelationManager extends RelationManager
{
    use ExtendableRelationManager;
}
