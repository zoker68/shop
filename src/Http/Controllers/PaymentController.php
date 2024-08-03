<?php

namespace Zoker\Shop\Http\Controllers;

class PaymentController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('shop::checkout.payment.breadcrumbs'), 'url' => route('checkout.payment')],
        ];

        return view('shop::pages.payment', compact('breadcrumbs'));
    }
}
