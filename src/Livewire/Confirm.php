<?php

namespace Zoker\Shop\Livewire;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Zoker\Shop\Exceptions\ProductInCartException;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Traits\Livewire\Alertable;

class Confirm extends Component
{
    use Alertable;

    public Cart $cart;

    #[Validate('required|accepted')]
    public bool $agreeToTerms = false;

    protected function getMessages(): array
    {
        return [
            'agreeToTerms.required' => __('shop::checkout.confirm.error.agreeToTerms'),
            'agreeToTerms.accepted' => __('shop::checkout.confirm.error.agreeToTerms'),
        ];
    }

    public function boot(): void
    {
        $this->cart = Cart::getCurrentCart();

        $this->cart->load('products', 'products.product', 'billingAddress', 'shippingAddress', 'shippingMethod', 'paymentMethod');

        try {
            $this->cart->checkAllItems();
        } catch (ProductInCartException $exception) {
            $this->redirect(route('cart'));
        }

        if (! $this->cart->shipping_address_id || ! $this->cart->billing_address_id) {
            redirect()->route('checkout');
        }

        if (! $this->cart->shipping_method_id) {
            redirect()->route('checkout.shipping');
        }

        if (! $this->cart->payment_method_id) {
            redirect()->route('checkout.payment');
        }
    }

    public function render(): View
    {
        $userData = auth()->check() ? auth()->user()->only(['email', 'name', 'surname', 'phone', 'company', 'vat']) : $this->cart->data;

        return view('shop::livewire.shop.confirm', compact('userData'));
    }

    public function onConfirm(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $this->cart->createOrder();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            $this->throwAlert('danger', 'Something went wrong please try again.');

            \Log::error($e->getMessage());

            return;
        }

        $this->redirect(route('checkout.success'));
    }
}
