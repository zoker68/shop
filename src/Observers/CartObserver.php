<?php

namespace Zoker68\Shop\Observers;

use Zoker68\Shop\Enums\CartStatus;
use Zoker68\Shop\Models\Cart;

class CartObserver
{
    public function creating(Cart $cart): void
    {
        if (! $cart->status) {
            $cart->status = CartStatus::CREATED;
        }
    }

    public function updated(Cart $cart): void
    {
        cache()->forget('cart_' . $cart->id);
    }
}
