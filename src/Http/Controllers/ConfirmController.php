<?php

namespace Zoker68\Shop\Http\Controllers;

class ConfirmController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker68.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker68.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker68.shop::checkout.confirm.breadcrumbs'), 'url' => route('checkout.confirm')],
        ];

        return view('pages.confirm', compact('breadcrumbs'));
    }
}
