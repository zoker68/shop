<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartProduct extends Model
{
    use HasFactory;

    /* --------------------- Relations Start --------------------- */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
    /* --------------------- Relations End --------------------- */

    /* --------------------- Mutators and Accessors Start  --------------------- */

    public function getTotalAttribute(): int
    {
        return $this->price * $this->quantity;
    }

    /* --------------------- Mutators and Accessors End  --------------------- */

    public function hasStock(): bool
    {
        return $this->quantity <= $this->product->stock || config('shop.product.allow_overstock');
    }

    public function sell(int $orderId): void
    {
        $this->product->sell($this->quantity);

        OrderProduct::create([
            'order_id' => $orderId,
            'product_id' => $this->product_id,
            'product_data' => $this->product,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
        ]);
    }
}
