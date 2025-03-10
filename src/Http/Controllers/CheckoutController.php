<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Models\Cart;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        $breadcrumbs = [
            ['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')],
            ['title' => __('shop::checkout.breadcrumbs'), 'url' => route('checkout')],
        ];

        $cart = Cart::getCurrentCart();

        $cart->load('products', 'products.product');

        return view('shop::pages.checkout', compact('breadcrumbs', 'cart'));
    }
}
