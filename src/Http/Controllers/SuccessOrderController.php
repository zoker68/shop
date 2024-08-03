<?php

namespace Zoker\Shop\Http\Controllers;

class SuccessOrderController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker.shop::checkout.success.breadcrumbs'), 'url' => route('checkout.success')],
        ];

        return view('pages.success-order', compact('breadcrumbs'));
    }
}
