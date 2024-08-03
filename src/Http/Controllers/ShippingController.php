<?php

namespace Zoker68\Shop\Http\Controllers;

class ShippingController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker68.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker68.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker68.shop::checkout.shipping.breadcrumbs'), 'url' => route('checkout.shipping')],
        ];

        return view('pages.shipping', compact('breadcrumbs'));
    }
}
