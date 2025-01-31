<?php

namespace Zoker\Shop\Services\Payment;

use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Zoker\Shop\Classes\Bases\BasePayment;
use Zoker\Shop\Mail\OrderPaidMail;
use Zoker\Shop\Models\Order;

class StripePaymentHandler extends BasePayment
{
    public function process(): \Laravel\Cashier\Checkout
    {
        return $this->order->checkout(
            $this->orderItems(),
            [
                'metadata' => [
                    'order_id' => $this->order->id,
                ],
                'success_url' => route(config('shop.stripe.success_route'), ['orderHash' => $this->order]),
                'cancel_url' => route(config('shop.stripe.cancel_route'), ['orderHash' => $this->order]),
            ]
        );
    }

    public function formatOderItems(): array
    {
        return $this->order->products
            ->loadMissing('product')
            ->map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => config('cashier.currency'),
                        'unit_amount' => $item->price,
                        'product_data' => [
                            'name' => $item->product->name,
                            'metadata' => [
                                'product_id' => $item->product_id,
                            ],
                        ],
                    ],
                    'quantity' => $item->quantity,
                ];
            })
            ->toArray();
    }

    public function orderItems(): array
    {
        $items = $this->formatOderItems();

        if ($this->order->total_shipping > 0) {
            $items[] = [
                'price_data' => [
                    'currency' => config('cashier.currency'),
                    'unit_amount' => $this->order->total_shipping,
                    'product_data' => [
                        'name' => __('shop::checkout.confirm.stripe.shipping_fee', ['shipping_method_name' => $this->order->shippingMethod->name]),
                        'metadata' => [
                            'shipping_method_id' => $this->order->shipping_method_id,
                        ],
                    ],
                ],
                'quantity' => 1,
            ];
        }

        if ($this->order->total_payment_fee > 0) {
            $items[] = [
                'price_data' => [
                    'currency' => config('cashier.currency'),
                    'unit_amount' => $this->order->total_payment_fee,
                    'product_data' => [
                        'name' => __('shop::checkout.confirm.stripe.payment_fee', ['payment_method_name' => $this->order->paymentMethod->name]),
                        'metadata' => [
                            'payment_method_id' => $this->order->payment_method_id,
                        ],
                    ],
                ],
                'quantity' => 1,
            ];
        }

        return $items;
    }

    public function setStripeSessionId(string $sessionId): self
    {
        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

        $this->order = Order::find($session->metadata->order_id);

        return $this;
    }

    public function success(): void
    {
        Mail::to($this->order->user_data['email'])->queue(new OrderPaidMail($this->order));
    }

    public function repeatPayment(): mixed
    {
        $this->updatePaymentStatusBefore();

        return $this->process();
    }
}
