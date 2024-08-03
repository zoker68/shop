<?php

namespace Zoker68\Shop\Http\Controllers;

class SuccessOrderController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker68.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker68.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker68.shop::checkout.success.breadcrumbs'), 'url' => route('checkout.success')],
        ];

        return view('pages.success-order', compact('breadcrumbs'));
    }
}
