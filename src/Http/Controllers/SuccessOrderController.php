<?php

namespace Zoker\Shop\Http\Controllers;

class SuccessOrderController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('shop::checkout.success.breadcrumbs'), 'url' => route('checkout.success')],
        ];

        return view('shop::pages.success-order', compact('breadcrumbs'));
    }
}
