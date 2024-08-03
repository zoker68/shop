<?php

namespace Zoker\Shop\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Zoker\Shop\Exceptions\ProductInCartException;
use Zoker\Shop\Models\Address;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Models\Country;
use Zoker\Shop\Models\Region;
use Zoker\Shop\Models\User;
use Zoker\Shop\Traits\Livewire\Alertable;

class Checkout extends Component
{
    use Alertable;

    public array $mainData = [];

    public array $address = [];

    public bool $billingSameAsShipping = true;

    public bool $asGuest = false;

    public Collection $countries;

    public array $regions = ['shipping' => [], 'billing' => []];

    public Cart $cart;

    public function getRules(): array
    {
        $rules = [];

        foreach ($this->getAddressTypes() as $addressType) {
            if (isset($this->address[$addressType]['id']) and $this->address[$addressType]['id'] > 0) {

                $rules += ['address.' . $addressType . '.id' => 'required|exists:addresses,id,' . (auth()->check() ? 'user_id,' . auth()->id() : 'session,' . Cart::getCartSession())];
            } else {
                $rules += [
                    'address.' . $addressType . '.country' => 'required|int|exists:countries,id,published,1',
                    'address.' . $addressType . '.city' => 'required|string|between:2,40',
                    'address.' . $addressType . '.zip' => 'required|string|between:4,20',
                    'address.' . $addressType . '.address' => 'required|string|between:5,100',
                ];
            }
            if (isset($this->address[$addressType]['country']) and $this->address[$addressType]['country'] > 0) {
                $rules += ['address.' . $addressType . '.region' => 'nullable|exists:regions,id,country_id,' . $this->address[$addressType]['country']];
            }
        }

        if (auth()->guest()) {
            $rules += [
                'mainData.email' => 'required|email|unique:users,email',
                'asGuest' => 'nullable|boolean',
                'mainData.password' => 'required_if_declined:asGuest|min:8|same:mainData.password_confirmation',
                'mainData.password_confirmation' => 'required_if_declined:asGuest',
                'mainData.name' => 'required|string|between:2,20',
                'mainData.surname' => 'required|string|between:2,20',
                'mainData.phone' => 'required|string|between:9,20',
                'mainData.birthday' => 'required|date|before:-14 years|after:-100 years',
                'mainData.company' => 'nullable|string|between:2,40',
                'mainData.vat' => 'nullable|string|between:2,20',
            ];
        }

        return $rules;
    }

    protected function getMessages(): array
    {
        $messages = [
            'mainData.email.required' => __('shop::checkout.error.mainData.email.required'),
            'mainData.email.email' => __('shop::checkout.error.mainData.email.email'),
            'mainData.email.unique' => __('shop::checkout.error.mainData.email.unique'),
            'mainData.password.required_if_declined' => __('shop::checkout.error.mainData.password.required'),
            'mainData.password.min' => __('shop::checkout.error.mainData.password.min'),
            'mainData.password.same' => __('shop::checkout.error.mainData.password.same'),
            'mainData.password_confirmation.required_if_declined' => __('shop::checkout.error.mainData.password_confirmation.required'),
            'mainData.name.required' => __('shop::checkout.error.mainData.name.required'),
            'mainData.name.between' => __('shop::checkout.error.mainData.name.between'),
            'mainData.surname.required' => __('shop::checkout.error.mainData.surname.required'),
            'mainData.surname.between' => __('shop::checkout.error.mainData.surname.between'),
            'mainData.phone.required' => __('shop::checkout.error.mainData.phone.required'),
            'mainData.phone.between' => __('shop::checkout.error.mainData.phone.between'),
            'mainData.birthday.required' => __('shop::checkout.error.mainData.birthday.required'),
            'mainData.birthday.before' => __('shop::checkout.error.mainData.birthday.before'),
            'mainData.birthday.after' => __('shop::checkout.error.mainData.birthday.after'),
            'mainData.company.between' => __('shop::checkout.error.mainData.company.between'),
            'mainData.vat.between' => __('shop::checkout.error.mainData.vat.between'),
        ];

        foreach ($this->getAddressTypes() as $addressType) {
            $messages += [
                'address.' . $addressType . '.country.required' => __('shop::checkout.error.address.country.required'),
                'address.' . $addressType . '.country.exists' => __('shop::checkout.error.address.country.exists'),
                'address.' . $addressType . '.region.exists' => __('shop::checkout.error.address.region.exists'),
                'address.' . $addressType . '.city.required' => __('shop::checkout.error.address.city.required'),
                'address.' . $addressType . '.city.between' => __('shop::checkout.error.address.city.between'),
                'address.' . $addressType . '.zip.required' => __('shop::checkout.error.address.zip.required'),
                'address.' . $addressType . '.zip.between' => __('shop::checkout.error.address.zip.between'),
                'address.' . $addressType . '.address.required' => __('shop::checkout.error.address.address.required'),
                'address.' . $addressType . '.address.between' => __('shop::checkout.error.address.address.between'),
            ];
        }

        return $messages;
    }

    public function mount(): void
    {
        $this->countries = Country::published()->sorted()->get()->pluck('name', 'id');

        if (auth()->guest() && $this->cart->data) {
            $this->mainData = $this->cart->data;
            $this->asGuest = true;
        }

        if ($this->cart->shipping_address_id) {
            $this->address['shipping']['id'] = $this->cart->shipping_address_id;
        }

        if ($this->cart->billing_address_id) {
            $this->address['billing']['id'] = $this->cart->billing_address_id;
        }

    }

    public function boot(): void
    {
        $this->cart = Cart::getCurrentCart();

        $this->cart->load('products', 'products.product');

        if ($this->cart->products->isEmpty()) {
            redirect()->route('cart');
        }

        try {
            $this->cart->checkAllItems();
        } catch (ProductInCartException $exception) {
            $this->redirect(route('cart'));
        }
    }

    public function render(): View
    {
        $addresses = Address::getUserAddressOptions();

        $this->setRegionOptions();

        return view('shop::livewire.shop.checkout', compact('addresses'));
    }

    public function onShipping(): void
    {
        $data = $this->validate();

        try {
            DB::beginTransaction();
            if (auth()->guest()) {
                $data['mainData']['birthday'] = $data['mainData']['birthday'] ? Carbon::parse($data['mainData']['birthday'])->format('Y-m-d') : null;

                if (isset($data['asGuest']) && ! $data['asGuest']) {
                    $this->registerUser($data['mainData']);
                } elseif (isset($data['asGuest']) && $data['asGuest']) {
                    $this->cart->data = $data['mainData'];
                    $this->cart->save();
                }
            }

            foreach ($this->getAddressTypes() as $addressType) {
                $this->saveAddress($data['address'][$addressType], $addressType);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $this->throwAlert('danger', 'Something went wrong. Please try again.');
        }

        $this->redirect(route('checkout.shipping'));
    }

    private function saveAddress(array $address, string $addressType): void
    {
        if (isset($address['id']) && $address['id'] > 0) {
            $this->updateCartAddress($addressType, $address['id'], $this->billingSameAsShipping);

            return;
        }

        $newAddress = Address::createUserAddress($address);

        $this->updateCartAddress($addressType, $newAddress->id, $this->billingSameAsShipping);
    }

    private function updateCartAddress(string $addressType, int $id, bool $billingSame): void
    {
        $cartUpdate[$addressType . '_address_id'] = $id;
        if ($billingSame) {
            $cartUpdate['billing_address_id'] = $id;
        }

        $this->cart->update($cartUpdate);
    }

    private function setRegionOptions(): void
    {
        if (isset($this->address['shipping']['country']) && $this->address['shipping']['country'] > 0) {
            $this->regions['shipping'] = Region::forCountryId($this->address['shipping']['country'])->get()->pluck('name', 'id');
        }

        if (isset($this->address['billing']['country']) && $this->address['billing']['country'] > 0) {
            if (isset($this->address['shipping']['country']) && $this->address['shipping']['country'] === $this->address['billing']['country']) {
                $this->regions['billing'] = $this->regions['shipping'];
            } else {
                $this->regions['billing'] = Region::forCountryId($this->address['billing']['country'])->get()->pluck('name', 'id');
            }
        }
    }

    private function registerUser(array $userData): void
    {
        unset($userData['password_confirmation']);

        User::register($userData);
    }

    private function getAddressTypes(): array
    {
        return ($this->billingSameAsShipping) ? ['shipping'] : ['shipping', 'billing'];
    }

    public function updatedEmail(): void
    {
        $this->validateOnly('email');
    }
}
