<?php

namespace Zoker\Shop\Livewire\Header;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Zoker\Shop\Traits\Livewire\Alertable;
use Zoker\Shop\Traits\Livewire\HasWishlistFunctions;

class WishlistWidget extends Component
{
    use Alertable, HasWishlistFunctions;

    public int $wishlistCount = 0;

    public function render(): View
    {
        $this->loadWishlist();

        $this->wishlistCount = count($this->wishlist);

        return view('shop::livewire.header.wishlist-widget');
    }

    #[On('updateWishlist')]
    public function updateWishlist() {}
}
