<?php

namespace Zoker\Shop\Http\Controllers;

class PaymentController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker.shop::checkout.payment.breadcrumbs'), 'url' => route('checkout.payment')],
        ];

        return view('pages.payment', compact('breadcrumbs'));
    }
}
