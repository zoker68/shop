<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Zoker\Shop\Classes\Model;

class Country extends Model
{
    use HasFactory;

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class, 'country_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function scopeSorted(Builder $query): Builder
    {
        return $query->orderBy('pined', 'desc')->orderBy('name');
    }
}
