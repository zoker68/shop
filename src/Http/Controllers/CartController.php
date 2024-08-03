<?php

namespace Zoker\Shop\Http\Controllers;

use Illuminate\View\View;

class CartController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.cart');
    }
}
