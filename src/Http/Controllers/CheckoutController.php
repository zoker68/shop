<?php

namespace Zoker68\Shop\Http\Controllers;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker68.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker68.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
        ];

        return view('pages.checkout', compact('breadcrumbs'));
    }
}
