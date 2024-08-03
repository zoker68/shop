<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Order extends Model
{
    use HashableId, SoftDeletes;

    protected function casts(): array
    {
        return [
            'shipped_at' => 'datetime',
            'paid_at' => 'datetime',
            'user_data' => 'array',
            'shipping_address_data' => 'array',
            'billing_address_data' => 'array',
            'shipping_method_data' => 'array',
            'payment_method_data' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function generalStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'general_order_status_id');
    }

    public function paymentStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'payment_order_status_id');
    }

    public function shippingStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'shipping_order_status_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
}
