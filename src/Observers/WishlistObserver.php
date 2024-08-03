<?php

namespace Zoker\Shop\Observers;

use Zoker\Shop\Models\Wishlist;

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
