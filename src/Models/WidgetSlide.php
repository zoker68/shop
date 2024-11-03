<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Bases\BaseModel;
use Zoker\Shop\Observers\WidgetSlideObserver;

#[ObservedBy(WidgetSlideObserver::class)]
class WidgetSlide extends BaseModel
{
    use SoftDeletes;

    const CACHE_KEY = 'slider_cache_';

    public function getCacheKey(): string
    {
        return self::CACHE_KEY . $this->code;
    }

    public function scopeForCode(Builder $query, string $code): Builder
    {
        return $query->where('code', $code);
    }

    public static function getSlider(string $code): array
    {
        return cache()->remember(self::CACHE_KEY . $code, now()->addHour(), fn () => self::forCode($code)->get()->toArray());
    }
}
