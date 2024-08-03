<?php

namespace Zoker\Shop\Http\Controllers;

class ConfirmController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('zoker.shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('zoker.shop::checkout.breadcrumbs'), 'url' => route('checkout')],
            ['title' => __('zoker.shop::checkout.confirm.breadcrumbs'), 'url' => route('checkout.confirm')],
        ];

        return view('pages.confirm', compact('breadcrumbs'));
    }
}
