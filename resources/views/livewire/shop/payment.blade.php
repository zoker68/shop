<div class="container grid grid-cols-12 gap-6 pb-14">
    <div class="col-span-12 lg:col-span-8">
        <h4 class="bg-secondary text-white px-3 py-2">{{ __('zoker68.shop::checkout.payment.title') }}</h4>

        <div x-data="{activeTab: 'shipping_method_{{ $cart->payment_method_id ?? $paymentMethods->first()->id }}'}">
            <div class="flex gap-2 sm:gap-5 mt-10">
                @foreach($paymentMethods as $paymentMethod)
                    <div @click="activeTab='shipping_method_{{ $paymentMethod->id }}'"
                         :class="{'!border-primary !rounded' : activeTab==='shipping_method_{{ $paymentMethod->id }}'}"
                         class="relative border  rounded w-[150px] h-[107px] smp-3 cursor-pointer flex flex-col justify-center items-center">
                        @if($paymentMethod->image)
                            <div class="sp_img">
                                <img loading="lazy" src="{{ $paymentMethod->getImage() }}"
                                     alt="{{ $paymentMethod->name }}" class="max-w-[100px] max-h-[50px]">
                            </div>
                        @endif
                        <p class="text-sm mt-3">{{ $paymentMethod->name }}</p>
                        <span x-show="activeTab==='shipping_method_{{ $paymentMethod->id }}'"
                              class="w-5 h-5 bg-primary text-white rounded-full absolute -right-2 -top-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="m10 13.6l5.9-5.9q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7l-6.6 6.6q-.3.3-.7.3q-.4 0-.7-.3l-2.6-2.6q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275Z"/>
                            </svg>
                        </span>
                    </div>
                @endforeach
            </div>

            @foreach($paymentMethods as $paymentMethod)
                <div x-show="activeTab==='shipping_method_{{ $paymentMethod->id }}'"
                     class="w-full sm:w-[640px] box_shadow px-6 py-4 mt-8">

                    <h4>{{ $paymentMethod->name }}</h4>
                    <div>
                        <div class="text-left mt-4 pb-4">
                            @if($paymentMethod->description)
                                <p>{{ $paymentMethod->description }}</p>
                            @endif

                            <p>{{ __('zoker68.shop::checkout.payment.fee') }} <span
                                    class="font-semibold">@money($paymentMethod->fee)</span></p>
                            @if($paymentMethod->fee_percent > 0)
                                <p>
                                    {{ __('zoker68.shop::checkout.payment.fee_percent') }} <span
                                        class="font-semibold">{{ $paymentMethod->fee_percent }}%</span>
                                </p>
                            @endif
                            <x-form.button class="mt-4"
                                           wire:click="setPaymentMethod('{{ $paymentMethod->id }}')">{{ __('zoker68.shop::checkout.payment.submit') }}</x-form.button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-span-12 lg:col-span-4">
        <x-partials.checkout.side-cart :cart="$cart"/>
    </div>
</div>
