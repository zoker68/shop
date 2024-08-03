<?php

namespace Zoker\Shop\Http\Controllers;

class ShippingController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('shop::checkout.shipping.breadcrumbs'), 'url' => route('checkout.shipping')],
        ];

        return view('shop::pages.shipping', compact('breadcrumbs'));
    }
}
