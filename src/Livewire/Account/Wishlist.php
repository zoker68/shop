<?php

namespace Zoker\Shop\Livewire\Account;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Zoker\Shop\Traits\Livewire\Alertable;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;
use Zoker\Shop\Traits\Livewire\HasWishlistFunctions;

class Wishlist extends Component
{
    use Alertable, HasCartFunctions, HasWishlistFunctions, WithPagination;

    public function render(): View
    {
        $userWishlist = auth()->user()->wishlist()->with('product')->whereHas('product', fn ($query) => $query->published())->paginate();

        return view('zoker.shop::livewire.auth.wishlist', compact('userWishlist'));
    }
}
