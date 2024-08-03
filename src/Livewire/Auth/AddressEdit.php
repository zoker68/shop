<?php

namespace Zoker68\Shop\Livewire\Auth;

use Illuminate\Support\Collection;
use Livewire\Component;
use Zoker68\Shop\Models\Address;
use Zoker68\Shop\Models\Country;
use Zoker68\Shop\Models\Region;
use Zoker68\Shop\Traits\Livewire\Alertable;

class AddressEdit extends Component
{
    use Alertable;

    public Collection $countries;

    public array $regions = [];

    public Address $address;

    public array $addressData;

    public function getRules(): array
    {
        $rules = [

            'addressData.country_id' => 'required|int|exists:countries,id,published,1',
            'addressData.city' => 'required|string|between:2,40',
            'addressData.zip' => 'required|string|between:4,20',
            'addressData.address' => 'required|string|between:5,100',
        ];

        if (isset($this->addressData['country_id']) and $this->addressData['country_id'] > 0) {
            $rules += ['addressData.region_id' => 'nullable|exists:regions,id,country_id,' . $this->addressData['country_id']];
        }

        return $rules;
    }

    protected function getMessages(): array
    {
        return [
            'addressData.country_id.required' => __('zoker68.shop::auth.address.error.country.required'),
            'addressData.country_id.exists' => __('zoker68.shop::auth.address.error.country.exists'),
            'addressData.region_id.exists' => __('zoker68.shop::auth.address.error.region.exists'),
            'addressData.city.required' => __('zoker68.shop::auth.address.error.city.required'),
            'addressData.city.between' => __('zoker68.shop::auth.address.error.city.between'),
            'addressData.zip.required' => __('zoker68.shop::auth.address.error.zip.required'),
            'addressData.zip.between' => __('zoker68.shop::auth.address.error.zip.between'),
            'addressData.address.required' => __('zoker68.shop::auth.address.error.address.required'),
            'addressData.address.between' => __('zoker68.shop::auth.address.error.address.between'),
        ];
    }

    public function mount(): void
    {
        $this->addressData = $this->address->toArray();
        $this->countries = Country::published()->sorted()->get()->pluck('name', 'id');
    }

    public function render()
    {
        $this->setRegionOptions();

        return view('zoker68.shop::livewire.auth.address-edit');
    }

    private function setRegionOptions(): void
    {
        $this->regions = Region::forCountryId($this->addressData['country_id'])->get()->pluck('name', 'id')->toArray();
    }

    public function onSave()
    {
        $this->validate();

        $this->address->fill($this->addressData)->save();

        return redirect()->route('account.profile.address.index')->with('success', __('zoker68.shop::auth.address.success'));
    }
}
