<?php

namespace Zoker68\Shop\Http\Controllers\Auth;

use Zoker68\Shop\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function __invoke()
    {
        return view('pages.auth.account.wishlist');
    }
}
