<?php

namespace Zoker68\Shop\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Zoker68\Shop\Exceptions\ProductInCartException;
use Zoker68\Shop\Models\Cart;
use Zoker68\Shop\Models\ShippingMethod;
use Zoker68\Shop\Traits\Livewire\Alertable;

class Shipping extends Component
{
    use Alertable;

    public Cart $cart;

    public function mount(): void
    {
        if (! $this->cart->shipping_address_id || ! $this->cart->billing_address_id) {
            redirect()->route('checkout');
        }
    }

    public function boot(): void
    {
        $this->cart = Cart::getCurrentCart();

        $this->cart->load('products', 'products.product');

        try {
            $this->cart->checkAllItems();
        } catch (ProductInCartException $exception) {
            $this->redirect(route('cart'));
        }
    }

    public function render(): View
    {
        $shippingMethods = ShippingMethod::getAvailableMethods($this->cart);

        return view('zoker68.shop::livewire.shop.shipping', compact('shippingMethods'));
    }

    public function setShippingMethod(int $shippingMethodId): void
    {
        if (! ShippingMethod::isMethodAvailable($this->cart, $shippingMethodId)) {
            $this->throwAlert('danger', __('zoker68.shop::checkout.shipping.error.method_not_available'));
        }

        $this->cart->shipping_method_id = $shippingMethodId;
        $this->cart->save();

        $this->cart->calculateTotals();

        redirect()->route('checkout.payment');
    }
}
