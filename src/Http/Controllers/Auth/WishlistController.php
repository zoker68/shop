<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Zoker\Shop\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function __invoke()
    {
        return view('shop::pages.auth.account.wishlist');
    }
}
