<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Zoker\Shop\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __invoke()
    {
        $orders = auth()->user()->orders()->with(['products', 'products.product'])->latest()->take(3)->get();

        return view('pages.auth.account.index', compact('orders'));
    }
}
