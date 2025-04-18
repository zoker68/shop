<div>
    <form wire:submit="onConfirm">
        <div class="container grid grid-cols-12 gap-6 pb-14">
            <div class="col-span-12 md:col-span-6 lg:col-span-8">
                <h4 class="bg-secondary text-white px-4 py-3 rounded-t-md">{{ __('shop::checkout.customer.title') }}</h4>
                <div class="grid grid-cols-3 mb-4 border">
                    <div class="px-3 py-2">{{ __('shop::checkout.customer.first_name') }}:</div>
                    <div class="px-3 py-2 col-span-2">{{ $userData['name'] }}</div>
                    <div class="px-3 py-2">{{ __('shop::checkout.customer.last_name') }}:</div>
                    <div class="px-3 py-2 col-span-2">{{ $userData['surname'] }}</div>
                    <div class="px-3 py-2">{{ __('shop::checkout.customer.email') }}:</div>
                    <div class="px-3 py-2 col-span-2">{{ $userData['email'] }}</div>
                    <div class="px-3 py-2">{{ __('shop::checkout.customer.phone') }}:</div>
                    <div class="px-3 py-2 col-span-2">{{ $userData['phone'] }}</div>
                    @if(optional($userData)['company'])
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.company') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ $userData['company'] }}</div>
                    @endif
                    @if(optional($userData)['vat'])
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.vat') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ $userData['vat'] }}</div>
                    @endif
                </div>
                @foreach(['shipping', 'billing'] as $addressType)
                    <h4 class="bg-secondary text-white px-4 py-3 rounded-t-md">{{ __('shop::checkout.' . $addressType . '_address.title') }}</h4>
                    <div class="grid grid-cols-3 mb-4 border">
                        <div class="px-3 py-2">{{  __('shop::checkout.address.country.label') }} </div>
                        <div class="px-3 py-2 col-span-2">{{ $cart[$addressType . 'Address']->country->name  }}</div>
                        @if($cart[$addressType . 'Address']->region)
                            <div class="px-3 py-2">{{ __('shop::checkout.address.region.label') }}:</div>
                            <div class="px-3 py-2 col-span-2">{{ $cart[$addressType . 'Address']->region->name }}</div>
                        @endif
                        <div class="px-3 py-2">{{ __('shop::checkout.address.city') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ $cart[$addressType . 'Address']->city }}</div>
                        <div class="px-3 py-2">{{ __('shop::checkout.address.zip') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ $cart[$addressType . 'Address']->zip }}</div>
                        <div class="px-3 py-2">{{ __('shop::checkout.address.address') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ $cart[$addressType . 'Address']->address }}</div>
                    </div>
                @endforeach
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <x-shop::partials.checkout.side-cart :cart="$cart"/>
                <div class="gap-3 items-center mt-4">
                    <x-shop::form.checkbox id="agreeToTerms" wire:model="agreeToTerms"/>
                    {{-- TODO: Add link to terms and conditions --}}
                    <x-shop::form.label for="agreeToTerms" class="text-sm cursor-pointer inline-flex items-center">
                        {{ __('shop::checkout.agree_with') }} <a href="terms-condition.html"
                                                           class="text-primary">{{ __('shop::checkout.agree_with_link') }}</a>
                    </x-shop::form.label>
                    <x-shop::form.error name="agreeToTerms"/>
                </div>
                <div class="mt-4">
                    <x-shop::form.button class="w-full">{{ __('shop::checkout.submit') }}</x-shop::form.button>
                </div>
            </div>
        </div>
    </form>
</div>
