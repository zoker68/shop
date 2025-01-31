<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Classes\Payment\PaymentHandlerInterface;
use Zoker\Shop\Classes\Payment\PaymentHandlerRegistry;
use Zoker\Shop\Models\Order;

class FailedOrderController extends Controller
{
    public function __invoke(string $orderHash)
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('shop::checkout.failed.breadcrumbs')],
        ];

        $order = Order::byHashOrFail($orderHash);

        /* @var PaymentHandlerInterface $handler */
        $handler = PaymentHandlerRegistry::get($order->paymentMethod->handler);

        $handler::make()->setOrder($order)->fail();

        return view('shop::pages.failed-order', compact('breadcrumbs', 'order'));
    }
}
