@props([
    'addressType',
    'countries',
    'regions',
    'addresses' => [],
    'address'
])
<div class="pt-4">
    <h4 class="bg-secondary text-white px-3 py-2">{{ $slot }}</h4>
    <div>
        @if (count($addresses) > 0)
            <div class="mt-4">
                <x-form.label for="{{ $addressType }}_select">{{ __('zoker68.shop::checkout.address.select.label') }}</x-form.label>
                <x-form.select :options="$addresses" id="{{ $addressType }}_id"
                               wire:model.live="address.{{ $addressType }}.id"
                               placeholder="{{ __('zoker68.shop::checkout.address.select.placeholder') }}"/>
                <x-form.error name="address.{{ $addressType }}.address.id"/>
            </div>
        @endif
        @if (!(isset($address[$addressType]['id']) && $address[$addressType]['id'] > 0))
            <div class="sm:flex md:block lg:flex gap-6 mt-6">
                <div class="w-full @if(count($regions[$addressType]) > 0)sm:w-1/2 md:w-full lg:w-1/2 @endif">
                    <x-form.label for="{{ $addressType }}_country" required="true">{{ __('zoker68.shop::checkout.address.country.label') }}</x-form.label>
                    <x-form.select :options="$countries" id="{{ $addressType }}_country" required="true"
                                   wire:model.live="address.{{ $addressType }}.country" placeholder="{{ __('zoker68.shop::checkout.address.country.placeholder') }}"/>
                    <x-form.error name="address.{{ $addressType }}.country"/>
                </div>
                @if(count($regions[$addressType]) > 0)
                    <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                        <x-form.label for="{{ $addressType }}_region">{{ __('zoker68.shop::checkout.address.region.label') }}</x-form.label>
                        <x-form.select :options="$regions[$addressType]" id="{{ $addressType }}_region"
                                       wire:model="address.{{ $addressType }}.region" placeholder="{{ __('zoker68.shop::checkout.address.region.placeholder') }}"/>
                        <x-form.error name="address.{{ $addressType }}.region"/>
                    </div>
                @endif
            </div>
            <div class="sm:flex md:block lg:flex gap-6 mt-6">
                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                    <x-form.label for="{{ $addressType }}_town_city" required="true">{{ __('zoker68.shop::checkout.address.city') }}</x-form.label>
                    <x-form.input id="{{ $addressType }}_town_city" type="text" required="true"
                                  wire:model="address.{{ $addressType }}.city"/>
                    <x-form.error name="address.{{ $addressType }}.city"/>
                </div>
                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                    <x-form.label for="{{ $addressType }}_zip_code" required="true">{{ __('zoker68.shop::checkout.address.zip') }}</x-form.label>
                    <x-form.input id="{{ $addressType }}_zip_code" type="text" required="true"
                                  wire:model="address.{{ $addressType }}.zip"/>
                    <x-form.error name="address.{{ $addressType }}.zip"/>
                </div>
            </div>
            <div class="mt-4">
                <x-form.label for="{{ $addressType }}_street_addr" required="true">{{ __('zoker68.shop::checkout.address.address') }}</x-form.label>
                <x-form.input id="{{ $addressType }}_street_addr" type="text" required="true"
                              wire:model="address.{{ $addressType }}.address"/>
                <x-form.error name="address.{{ $addressType }}.address"/>
            </div>
        @endif
    </div>
</div>
