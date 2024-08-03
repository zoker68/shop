<?php

namespace Zoker68\Shop\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('index'));

    }
}
