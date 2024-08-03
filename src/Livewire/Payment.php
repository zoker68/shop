<?php

namespace Zoker68\Shop\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Zoker68\Shop\Exceptions\ProductInCartException;
use Zoker68\Shop\Models\Cart;
use Zoker68\Shop\Models\PaymentMethod;
use Zoker68\Shop\Traits\Livewire\Alertable;

class Payment extends Component
{
    use Alertable;

    public Cart $cart;

    public function mount(): void
    {
        if (! $this->cart->shipping_address_id || ! $this->cart->billing_address_id) {
            redirect()->route('checkout');
        }

        if (! $this->cart->shipping_method_id) {
            redirect()->route('checkout.shipping');
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
        $paymentMethods = PaymentMethod::getAvailableMethods();

        return view('zoker68.shop::livewire.shop.payment', compact('paymentMethods'));
    }

    public function setPaymentMethod(int $paymentMethodId): void
    {
        if (! PaymentMethod::isMethodAvailable($this->cart, $paymentMethodId)) {
            $this->throwAlert('danger', __('zoker68.shop::checkout.payment.error.method_not_available'));
        }

        $this->cart->payment_method_id = $paymentMethodId;
        $this->cart->save();

        $this->cart->calculateTotals();

        redirect()->route('checkout.confirm');
    }
}
