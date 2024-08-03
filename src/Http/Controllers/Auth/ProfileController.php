<?php

namespace Zoker68\Shop\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\View\View;
use Zoker68\Shop\Http\Controllers\Controller;
use Zoker68\Shop\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.account.profile.index');
    }

    public function update(ProfileRequest $request)
    {
        $data = $request->validated();

        $oldEmail = auth()->user()->email;

        if ($data['email'] !== $oldEmail) {
            $data['email_verified_at'] = null;
        }

        auth()->user()->update($data);

        if ($data['email'] !== $oldEmail and auth()->user() instanceof MustVerifyEmail) {
            auth()->user()->sendEmailVerificationNotification();

            return redirect(route('account.profile.index'))->with('info', __('zoker68.shop::auth.profile.verification'));
        }

        return redirect(route('account.profile.index'))->with('success', __('zoker68.shop::auth.profile.success'));
    }
}
