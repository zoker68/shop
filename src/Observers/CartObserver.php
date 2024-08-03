<?php

namespace Zoker\Shop\Observers;

use Zoker\Shop\Enums\CartStatus;
use Zoker\Shop\Models\Cart;

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
