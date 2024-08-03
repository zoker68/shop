<?php

namespace Zoker68\Shop\Livewire\Account;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Zoker68\Shop\Traits\Livewire\Alertable;
use Zoker68\Shop\Traits\Livewire\HasCartFunctions;
use Zoker68\Shop\Traits\Livewire\HasWishlistFunctions;

class Wishlist extends Component
{
    use Alertable, HasCartFunctions, HasWishlistFunctions, WithPagination;

    public function render(): View
    {
        $userWishlist = auth()->user()->wishlist()->with('product')->whereHas('product', fn ($query) => $query->published())->paginate();

        return view('zoker68.shop::livewire.auth.wishlist', compact('userWishlist'));
    }
}
