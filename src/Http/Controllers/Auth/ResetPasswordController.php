<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Zoker\Shop\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function __invoke($email)
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }

        return view('shop::pages.auth.reset-password', ['email' => $email]);
    }
}
