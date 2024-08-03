<?php

namespace Zoker68\Shop\Observers;

use Zoker68\Shop\Models\Wishlist;

class WishlistObserver
{
    public function created(Wishlist $wishlist): void
    {
        cache()->forget('wishlist_' . auth()->id());
    }

    public function deleted(Wishlist $wishlist): void
    {
        cache()->forget('wishlist_' . auth()->id());
    }
}
