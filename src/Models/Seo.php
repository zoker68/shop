<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Seo extends Model
{
    protected $table = 'seo';

    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}
