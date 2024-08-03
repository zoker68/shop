<?php

namespace Zoker\Shop\Traits\Livewire;

use Zoker\Shop\Models\Product;

trait HasWishlistFunctions
{
    public array $wishlist = [];

    public function loadWishlist(): void
    {
        if (auth()->check()) {
            $this->wishlist = cache()->remember(
                'wishlist_' . auth()->id(),
                now()->addHour(),
                fn () => auth()->user()->wishlist()->whereHas('product', fn ($query) => $query->published())->pluck('product_id')->toArray()
            );
        }
    }

    public function toggleWishlist(string $productHash): void
    {
        $this->loadWishlist();
        $productId = Product::hashToId($productHash);

        if (auth()->check()) {
            if (in_array($productId, $this->wishlist)) {
                auth()->user()->wishlist()->where('product_id', $productId)->delete();
            } else {
                auth()->user()->wishlist()->create(['product_id' => $productId]);
            }

            $this->wishlistUpdated();
        } else {
            $this->throwAlert('info', __('zoker.shop::wishlist.must_be_logged_in'));
        }
    }

    public function wishlistUpdated(): void
    {
        cache()->forget('wishlist_' . auth()->id());
        $this->loadWishlist();
        $this->dispatch('updateWishlist');
    }
}
