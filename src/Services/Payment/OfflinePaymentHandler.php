<?php

namespace Zoker\Shop\Services\Payment;

use Illuminate\Routing\Redirector;
use Zoker\Shop\Classes\Bases\BasePayment;

class OfflinePaymentHandler extends BasePayment
{
    public function process(): Redirector
    {
        return redirect(route('checkout.success'));
    }

    public function paymentRedirect(): string
    {
        return route('checkout.success');
    }

    public function success(): void {}

    public function repeatPayment(): Redirector
    {
        return redirect(route('checkout.success'));
    }
}
