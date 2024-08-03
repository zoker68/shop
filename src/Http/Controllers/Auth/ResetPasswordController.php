<?php

namespace Zoker68\Shop\Http\Controllers\Auth;

use Zoker68\Shop\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function __invoke($email)
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }

        return view('pages.auth.reset-password', ['email' => $email]);
    }
}
