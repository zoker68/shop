<?php

namespace Zoker\Shop\Classes\Bases;

use Illuminate\Database\Eloquent\Model;
use Zoker\Shop\Traits\Extendable;

abstract class BaseModel extends Model
{
    use Extendable;
}
