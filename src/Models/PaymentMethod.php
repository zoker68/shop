<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Zoker\Shop\Classes\Model;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected function fee(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value * (currency()->getSubunit()),
        );
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public static function getAvailableMethods(): Collection
    {
        return self::published()->orderBy('sort')->get();
    }

    public function getImage(): ?string
    {
        return Storage::url($this->image);
    }

    public static function isMethodAvailable(Cart $cart, int $paymentMethodId): bool
    {
        return self::query()
            ->published()
            ->where('id', $paymentMethodId)
            ->exists();
    }
}
