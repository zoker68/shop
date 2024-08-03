<?php

namespace Zoker68\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
