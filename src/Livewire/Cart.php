<?php

namespace Zoker68\Shop\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Zoker68\Shop\Exceptions\ProductInCartException;
use Zoker68\Shop\Models\Cart as CartModel;
use Zoker68\Shop\Traits\Livewire\Alertable;
use Zoker68\Shop\Traits\Livewire\HasCartFunctions;

class Cart extends Component
{
    use Alertable, HasCartFunctions;

    public CartModel $cart;

    public function boot()
    {
        $this->cart = CartModel::getCurrentCart();
        $this->cart->load('products', 'products.product');
    }

    public function render(): View
    {
        return view('zoker68.shop::livewire.shop.cart');
    }

    public function onCheckout(): void
    {
        try {
            $this->cart->checkAllItems();
        } catch (ProductInCartException $exception) {
            $this->throwAlert('warning', $exception->getMessage());

            return;
        }

        redirect()->route('checkout');
    }
}