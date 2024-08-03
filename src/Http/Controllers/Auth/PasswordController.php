<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Illuminate\View\View;
use Zoker\Shop\Http\Controllers\Controller;
use Zoker\Shop\Http\Requests\PasswordUpdateRequest;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('shop::pages.auth.account.password');
    }

    public function update(PasswordUpdateRequest $request)
    {
        $data = $request->validated();

        auth()->user()->password = $data['new_password'];
        auth()->user()->save();

        return redirect(route('account.profile.dashboard'))->with('success', __('shop::auth.password.success'));
    }
}
