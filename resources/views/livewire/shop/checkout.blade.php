<div>
    <form wire:submit="onShipping">
        <div class="container grid grid-cols-12 gap-6 pb-14">
            <div class="col-span-12 md:col-span-6 lg:col-span-8">
                <h4 class="bg-secondary text-white px-4 py-3 rounded-t-md">{{ __('shop::checkout.customer.title') }}</h4>
                @guest()
                    <div>
                        <div class="mt-4">
                            <x-shop::form.label for="email" required="true">{{ __('shop::checkout.customer.email') }}</x-shop::form.label>
                            <x-shop::form.input id="email" type="email" required="true" wire:model.blur="mainData.email"/>

                            <x-shop::form.error name="mainData.email"/>
                            {{ __('shop::checkout.customer.have_account') }} <a href="{{ route('login') }}"
                                                                          class="text-primary">{{ __('shop::checkout.customer.have_account_link') }}</a>
                        </div>
                        <div class="mt-4">
                            <x-shop::form.checkbox id="asGuest" wire:model.live="asGuest"/>
                            <x-shop::form.label for="asGuest"
                                          class="inline-flex items-center pl-3">{{ __('shop::checkout.customer.as_guest') }}</x-shop::form.label>
                        </div>
                        @if(!$asGuest)
                            <div class="sm:flex md:block lg:flex gap-6 mt-6">
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                    <x-shop::form.label for="password"
                                                  required="true">{{ __('shop::checkout.customer.password') }}</x-shop::form.label>
                                    <x-shop::form.input id="password" type="password" required="true"
                                                  wire:model="mainData.password"/>
                                    <x-shop::form.error name="mainData.password"/>
                                </div>
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                    <x-shop::form.label for="password_confirmation" required="true">
                                        {{ __('shop::checkout.customer.password_confirmation') }}
                                    </x-shop::form.label>
                                    <x-shop::form.input id="password_confirmation" type="password" required="true"
                                                  wire:model="mainData.password_confirmation"/>
                                    <x-shop::form.error name="mainData.password_confirmation"/>
                                </div>
                            </div>
                        @endif
                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-shop::form.label for="first_name"
                                              required="true">{{ __('shop::checkout.customer.first_name') }}</x-shop::form.label>
                                <x-shop::form.input id="first_name" type="text" required="true"
                                              wire:model="mainData.name"/>
                                <x-shop::form.error name="mainData.name"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-shop::form.label for="last_name"
                                              required="true">{{ __('shop::checkout.customer.last_name') }}</x-shop::form.label>
                                <x-shop::form.input id="last_name" type="text" required="true"
                                              wire:model="mainData.surname"/>
                                <x-shop::form.error name="mainData.surname"/>
                            </div>
                        </div>
                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-shop::form.label for="phone_number"
                                              required="true">{{ __('shop::checkout.customer.phone') }}</x-shop::form.label>
                                <x-shop::form.input id="phone_number" type="text" required="true"
                                              wire:model="mainData.phone"/>
                                <x-shop::form.error name="mainData.phone"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-shop::form.label for="birthday" required="true">{{ __('shop::checkout.customer.birthday') }}</x-shop::form.label>
                                <x-shop::form.input id="birthday" type="date" required="true"
                                              min="{{ now()->subYears(100)->format('Y-m-d') }}" max="{{ now()->subYears(14)->format('Y-m-d') }}"
                                              wire:model="mainData.birthday"/>
                                <x-shop::form.error name="mainData.birthday"/>
                            </div>
                        </div>

                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-shop::form.label for="company_name">{{ __('shop::checkout.customer.company') }}</x-shop::form.label>
                                <x-shop::form.input id="company_name" type="text"
                                              wire:model="mainData.company"/>
                                <x-shop::form.error name="mainData.company"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-shop::form.label for="vat_number">{{ __('shop::checkout.customer.vat') }}</x-shop::form.label>
                                <x-shop::form.input id="vat_number" type="text"
                                              wire:model="mainData.vat"/>
                                <x-shop::form.error name="mainData.vat"/>
                            </div>
                        </div>
                    </div>
                @endguest
                @auth()
                    <div class="grid grid-cols-3 mb-4 border border-[#E9E4E4] border-t-0 p-4 rounded-b-md ">
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.first_name') }}:</div>
                        <div class="px-3 py-2">{{ auth()->user()->name }}</div>
                        <div class="px-3 py-2 text-right"><a href="{{ route('account.profile.index') }}" class="text-primary hover:text-secondary transition duration-300">{{ __('shop::checkout.customer.edit') }}</a></div>
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.last_name') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->surname }}</div>
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.email') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->email }}</div>
                        <div class="px-3 py-2">{{ __('shop::checkout.customer.phone') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->phone }}</div>
                        @if(auth()->user()->company)
                            <div class="px-3 py-2">{{ __('shop::checkout.customer.company') }}:</div>
                            <div class="px-3 py-2 col-span-2">{{ auth()->user()->company }}</div>
                        @endif
                        @if(auth()->user()->vat)
                            <div class="px-3 py-2">{{ __('shop::checkout.customer.vat') }}:</div>
                            <div class="px-3 py-2 col-span-2">{{ auth()->user()->vat }}</div>
                        @endif
                    </div>
                @endauth
                <x-shop::partials.checkout.address :countries="$countries" :regions="$regions" :addresses="$addresses"
                                             :address="$address" addressType="shipping">
                    {{ __('shop::checkout.shipping_address.title') }}
                </x-shop::partials.checkout.address>
                <div class="mt-4">
                    <x-shop::form.checkbox id="billing_address_same" wire:model.live="billingSameAsShipping"/>
                    <label for="billing_address_same" class="inline-flex items-center">
                        <span class="pl-3">{{ __('shop::checkout.billing_address.same_as_shipping') }}</span>
                    </label>
                </div>

                @if(!$billingSameAsShipping)
                    <x-shop::partials.checkout.address :countries="$countries" :regions="$regions" :addresses="$addresses"
                                                 :address="$address" addressType="billing">
                        {{ __('shop::checkout.billing_address.title') }}
                    </x-shop::partials.checkout.address>
                @endif
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <x-shop::partials.checkout.side-cart :cart="$cart"/>

                <div class="mt-4">
                    <x-shop::form.button class="w-full">{{ __('shop::checkout.submit') }}</x-shop::form.button>
                </div>
            </div>
        </div>
    </form>
</div>
