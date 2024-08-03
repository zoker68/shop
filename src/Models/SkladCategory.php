<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkladCategory extends Model
{
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function scopeNoCategory(Builder $query): Builder
    {
        return $query->whereNull('category_id');
    }
}
