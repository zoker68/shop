<div>
    <form wire:submit="onShipping">
        <div class="container grid grid-cols-12 gap-6 pb-14">
            <div class="col-span-12 md:col-span-6 lg:col-span-8">
                <h4 class="bg-secondary text-white px-3 py-2">{{ __('checkout.customer.title') }}</h4>
                @guest()
                    <div>
                        <div class="mt-4">
                            <x-form.label for="email" required="true">{{ __('checkout.customer.email') }}</x-form.label>
                            <x-form.input id="email" type="email" required="true" wire:model.blur="mainData.email"/>

                            <x-form.error name="mainData.email"/>
                            {{ __('checkout.customer.have_account') }} <a href="{{ route('login') }}"
                                                                          class="text-primary">{{ __('checkout.customer.have_account_link') }}</a>
                        </div>
                        <div class="mt-4">
                            <x-form.checkbox id="asGuest" wire:model.live="asGuest"/>
                            <x-form.label for="asGuest"
                                          class="inline-flex items-center pl-3">{{ __('checkout.customer.as_guest') }}</x-form.label>
                        </div>
                        @if(!$asGuest)
                            <div class="sm:flex md:block lg:flex gap-6 mt-6">
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                    <x-form.label for="password"
                                                  required="true">{{ __('checkout.customer.password') }}</x-form.label>
                                    <x-form.input id="password" type="password" required="true"
                                                  wire:model="mainData.password"/>
                                    <x-form.error name="mainData.password"/>
                                </div>
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                    <x-form.label for="password_confirmation" required="true">
                                        {{ __('checkout.customer.password_confirmation') }}
                                    </x-form.label>
                                    <x-form.input id="password_confirmation" type="password" required="true"
                                                  wire:model="mainData.password_confirmation"/>
                                    <x-form.error name="mainData.password_confirmation"/>
                                </div>
                            </div>
                        @endif
                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-form.label for="first_name"
                                              required="true">{{ __('checkout.customer.first_name') }}</x-form.label>
                                <x-form.input id="first_name" type="text" required="true"
                                              wire:model="mainData.name"/>
                                <x-form.error name="mainData.name"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-form.label for="last_name"
                                              required="true">{{ __('checkout.customer.last_name') }}</x-form.label>
                                <x-form.input id="last_name" type="text" required="true"
                                              wire:model="mainData.surname"/>
                                <x-form.error name="mainData.surname"/>
                            </div>
                        </div>
                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-form.label for="phone_number"
                                              required="true">{{ __('checkout.customer.phone') }}</x-form.label>
                                <x-form.input id="phone_number" type="text" required="true"
                                              wire:model="mainData.phone"/>
                                <x-form.error name="mainData.phone"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-form.label for="birthday" required="true">{{ __('checkout.customer.birthday') }}</x-form.label>
                                <x-form.input id="birthday" type="date" required="true"
                                              min="{{ now()->subYears(100)->format('Y-m-d') }}" max="{{ now()->subYears(14)->format('Y-m-d') }}"
                                              wire:model="mainData.birthday"/>
                                <x-form.error name="mainData.birthday"/>
                            </div>
                        </div>

                        <div class="sm:flex md:block lg:flex gap-6 mt-6">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <x-form.label for="company_name">{{ __('checkout.customer.company') }}</x-form.label>
                                <x-form.input id="company_name" type="text"
                                              wire:model="mainData.company"/>
                                <x-form.error name="mainData.company"/>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                                <x-form.label for="vat_number">{{ __('checkout.customer.vat') }}</x-form.label>
                                <x-form.input id="vat_number" type="text"
                                              wire:model="mainData.vat"/>
                                <x-form.error name="mainData.vat"/>
                            </div>
                        </div>
                    </div>
                @endguest
                @auth()
                    <div class="grid grid-cols-3 my-4 border">
                        <div class="px-3 py-2">{{ __('checkout.customer.first_name') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->name }}</div>
                        <div class="px-3 py-2">{{ __('checkout.customer.last_name') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->surname }}</div>
                        <div class="px-3 py-2">{{ __('checkout.customer.email') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->email }}</div>
                        <div class="px-3 py-2">{{ __('checkout.customer.phone') }}:</div>
                        <div class="px-3 py-2 col-span-2">{{ auth()->user()->phone }}</div>
                        @if(auth()->user()->company)
                            <div class="px-3 py-2">{{ __('checkout.customer.company') }}:</div>
                            <div class="px-3 py-2 col-span-2">{{ auth()->user()->company }}</div>
                        @endif
                        @if(auth()->user()->vat)
                            <div class="px-3 py-2">{{ __('checkout.customer.vat') }}:</div>
                            <div class="px-3 py-2 col-span-2">{{ auth()->user()->vat }}</div>
                        @endif
                        {{-- TODO: Add Link to edit profile info --}}
                    </div>
                @endauth
                <x-partials.checkout.address :countries="$countries" :regions="$regions" :addresses="$addresses"
                                             :address="$address" addressType="shipping">
                    {{ __('checkout.shipping_address.title') }}
                </x-partials.checkout.address>
                <div class="mt-4">
                    <x-form.checkbox id="billing_address_same" wire:model.live="billingSameAsShipping"/>
                    <label for="billing_address_same" class="inline-flex items-center">
                        <span class="pl-3">{{ __('checkout.billing_address.same_as_shipping') }}</span>
                    </label>
                </div>

                @if(!$billingSameAsShipping)
                    <x-partials.checkout.address :countries="$countries" :regions="$regions" :addresses="$addresses"
                                                 :address="$address" addressType="billing">
                        {{ __('checkout.billing_address.title') }}
                    </x-partials.checkout.address>
                @endif
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <x-partials.checkout.side-cart :cart="$cart"/>

                <div class="mt-4">
                    <x-form.button class="w-full">{{ __('checkout.submit') }}</x-form.button>
                </div>
            </div>
        </div>
    </form>
</div>
