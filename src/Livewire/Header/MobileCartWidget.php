<?php

namespace Zoker\Shop\Livewire\Header;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;

class MobileCartWidget extends Component
{
    use HasCartFunctions;

    public Cart $cart;

    public int $cartCountProducts = 0;

    public function render(): View
    {
        $this->cart = Cart::getWidgetCart();

        $this->cartCountProducts = $this->cart->products->count();

        return view('shop::livewire.header.cart-widget-mobile');
    }

    #[On('cartUpdated')]
    public function updateCart() {}
}
