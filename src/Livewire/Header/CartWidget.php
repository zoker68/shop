<?php

namespace Zoker\Shop\Livewire\Header;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;

class CartWidget extends Component
{
    use HasCartFunctions;

    public Cart $cart;

    public int $cartCountProducts = 0;

    public function mount(): void
    {
        $this->cart = Cart::getCurrentCart();
    }

    public function render(): View
    {
        $this->cart = cache()->remember(
            'cart_' . $this->cart->id,
            now()->addMinutes(15),
            fn () => $this->cart->load('products', 'products.product')
        );

        $this->cartCountProducts = $this->cart->products->count();

        return view('shop::livewire.header.cart-widget');
    }

    #[On('cartUpdated')]
    public function updateCart() {}
}
