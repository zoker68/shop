<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WidgetSlide extends Model
{
    use SoftDeletes;

    const CACHE_KEY = 'slider_cache_';

    public function scopeForCode(Builder $query, string $code): Builder
    {
        return $query->where('code', $code);
    }

    public static function getSlider(string $code): array
    {
        return cache()->remember(self::CACHE_KEY . $code, now()->addMinutes(5), fn () => self::forCode($code)->get()->toArray());
    }
}
