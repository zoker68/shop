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

class PaymentMethod extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function shippingMethods(): BelongsToMany
    {
        return $this->belongsToMany(ShippingMethod::class, 'payment_shipping', 'payment_method_id', 'shipping_method_id');
    }

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

    public static function getAvailableMethods(ShippingMethod|int|null $shippingMethod = null): Collection
    {
        if ($shippingMethod instanceof ShippingMethod) {
            $shippingMethod = $shippingMethod->id;
        }

        return self::query()
            ->when($shippingMethod, fn ($query) => $query->whereHas('shippingMethods', fn ($query) => $query->published()->where('shipping_method_id', $shippingMethod)))
            ->published()
            ->orderBy('sort')
            ->get();
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
