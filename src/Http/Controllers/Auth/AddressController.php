<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Illuminate\View\View;
use Zoker\Shop\Http\Controllers\Controller;
use Zoker\Shop\Models\Address;

class AddressController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.account.address.index', ['addresses' => Address::getUserAddressOptions()]);
    }

    public function edit(Address $address): View
    {
        abort_if($address->user_id !== auth()->id(), 403);

        return view('pages.auth.account.address.edit', [
            'address' => $address,
        ]);
    }

    public function destroy(Address $address)
    {
        abort_if($address->user_id !== auth()->id(), 403);

        $address->delete();

        return redirect()->route('account.profile.address.index')->with('success', __('zoker.shop::auth.address.success_delete'));
    }
}
