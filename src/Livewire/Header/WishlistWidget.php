<?php

namespace Zoker68\Shop\Livewire\Header;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Zoker68\Shop\Traits\Livewire\Alertable;
use Zoker68\Shop\Traits\Livewire\HasWishlistFunctions;

class WishlistWidget extends Component
{
    use Alertable, HasWishlistFunctions;

    public int $wishlistCount = 0;

    public function render(): View
    {
        $this->loadWishlist();

        $this->wishlistCount = count($this->wishlist);

        return view('zoker68.shop::livewire.header.wishlist-widget');
    }

    #[On('updateWishlist')]
    public function updateWishlist() {}
}
