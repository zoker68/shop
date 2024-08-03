<?php

namespace Zoker\Shop\Http\Controllers;

class ShippingController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker.shop::checkout.shipping.breadcrumbs'), 'url' => route('checkout.shipping')],
        ];

        return view('pages.shipping', compact('breadcrumbs'));
    }
}
