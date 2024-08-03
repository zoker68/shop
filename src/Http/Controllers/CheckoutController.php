<?php

namespace Zoker\Shop\Http\Controllers;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
        ];

        return view('pages.checkout', compact('breadcrumbs'));
    }
}
