<?php

namespace Zoker68\Shop\Http\Controllers;

class PaymentController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker68.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker68.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker68.shop::checkout.payment.breadcrumbs'), 'url' => route('checkout.payment')],
        ];

        return view('pages.payment', compact('breadcrumbs'));
    }
}
