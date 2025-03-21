<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Zoker\Shop\Classes\Bases\BaseModel;

class ShippingMethod extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'payment_shipping', 'shipping_method_id', 'payment_method_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function scopeForTotal(Builder $query, int $total): Builder
    {
        return $query
            ->where(fn (Builder $q) => $q->where('available_from', '<=', $total)->orWhere('available_from', 0))
            ->where(fn (Builder $q) => $q->where('available_until', '>=', $total)->orWhere('available_until', 0));
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value * (currency()->getSubunit()),
        );
    }

    protected function availableFrom(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value * (currency()->getSubunit()),
        );
    }

    protected function availableUntil(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value * (currency()->getSubunit()),
        );
    }

    public static function getAvailableMethods(Cart $cart): Collection
    {
        return ShippingMethod::query()
            ->published()
            ->forTotal($cart->total_products)
            ->orderBy('sort')
            ->get();
    }

    public static function isMethodAvailable(Cart $cart, int $shippingMethodId): bool
    {
        return ShippingMethod::query()
            ->published()
            ->forTotal($cart->total_products)
            ->where('id', $shippingMethodId)
            ->exists();
    }

    public function getImage(): ?string
    {
        return Storage::url($this->image);
    }
}
