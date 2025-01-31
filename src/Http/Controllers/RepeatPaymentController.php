<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Classes\Payment\PaymentHandlerInterface;
use Zoker\Shop\Classes\Payment\PaymentHandlerRegistry;
use Zoker\Shop\Models\Order;

class RepeatPaymentController extends Controller
{
    public function __invoke(string $orderHash)
    {
        $order = Order::byHashOrFail($orderHash);

        /* @var PaymentHandlerInterface $handler */
        $handler = PaymentHandlerRegistry::get($order->paymentMethod->handler);

        return $handler::make()->setOrder($order)->repeatPayment();
    }
}
