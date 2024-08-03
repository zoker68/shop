<?php

namespace Zoker\Shop\Http\Controllers;

class ConfirmController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('shop::checkout.confirm.breadcrumbs'), 'url' => route('checkout.confirm')],
        ];

        return view('pages.confirm', compact('breadcrumbs'));
    }
}
