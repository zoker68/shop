<div class="container pb-10">
    @if($cart->products->count())
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-9">
                <div class=" w-full">
                    <div class="grid grid-cols-6 md:grid-cols-7 rounded-t-md overflow-hidden">
                        <div class="cart-header">&nbsp;</div>
                        <div class="cart-header col-span-3 md:col-span-4">{{ __('shop::cart.column.product') }}</div>
                        <div class="cart-header">{{ __('shop::cart.column.quantity') }}</div>
                        <div class="cart-header col-span-2 md:col-span-1">{{ __('shop::cart.column.total_price') }}</div>
                    </div>
                    @foreach($cart->products as $item)
                    <div class="grid grid-cols-6 md:grid-cols-7 items-center border border-t-0 border-[#E9E4E4] last:rounded-b-md">
                        <div class="hidden md:block p-3">
                            <img loading="lazy" src="{{ $item->product->getCoverImage(100, 100) }}"
                                 alt="{{ $item->product->name }}" class="w-[120px] px-2 py-1">
                        </div>
                        <div
                            class="col-span-3 px-2 py-1 md:col-span-4">
                            <a href="{{ route('product', $item->product) }}">
                                {{ $item->product->name }}
                            </a>
                            <p class="text-secondary font-medium">@money($item->price)</p>
                            @if(!$item->hasStock())
                                <p class="text-red-500">{{ __('shop::cart.error.stock', ['quantity' => $item->product->stock]) }}</p>
                            @endif
                            @if(!$item->product->isAvailable())
                                <p class="text-red-500">{{ __('shop::cart.error.available') }}</p>
                            @endif
                        </div>
                        <div class="px-2 py-1">
                            <input type="number" min="1"
                                   wire:change="updateCartQuantity('{{ $item->product->hash }}', $event.target.value)"
                                   value="{{ $item->quantity }}" class="w-12 md:w-16 text-center">
                        </div>
                        <div
                            class="col-span-2 md:col-span-1 px-2 py-1 relative">
                            <p class="text-secondary font-medium">@money($item->price * $item->quantity)</p>
                            <button wire:click="removeFromCart('{{ $item->product->hash }}')"
                                    class="absolute bottom-1 right-3">
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6q-.425 0-.713-.287Q4 5.425 4 5t.287-.713Q4.575 4 5 4h4q0-.425.288-.713Q9.575 3 10 3h4q.425 0 .713.287Q15 3.575 15 4h4q.425 0 .712.287Q20 4.575 20 5t-.288.713Q19.425 6 19 6v13q0 .825-.587 1.413Q17.825 21 17 21ZM7 6v13h10V6Zm2 10q0 .425.288.712Q9.575 17 10 17t.713-.288Q11 16.425 11 16V9q0-.425-.287-.713Q10.425 8 10 8t-.712.287Q9 8.575 9 9Zm4 0q0 .425.288.712q.287.288.712.288t.713-.288Q15 16.425 15 16V9q0-.425-.287-.713Q14.425 8 14 8t-.712.287Q13 8.575 13 9ZM7 6v13V6Z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-12 lg:col-span-3 border border-[#E9E4E4] p-6 rounded-md">
                <div>
                    <h4 class="text-lg font-semibold text-secondary">{{ __('shop::cart.side.title') }}</h4>
                    <div class="space-y-2 border-b pb-3 mt-4">
                        <div class="flex justify-between">
                            <p class="font-medium">{{ __('shop::cart.side.subtotal') }}</p>
                            <p class="font-medium">@money($cart->total_products)</p>
                        </div>
                        @if($cart->shipping_method_id > 0)
                        <div class="flex justify-between">
                            <p class="font-medium">{{ __('shop::cart.side.shipping_price') }}</p>
                            <p class="font-medium">@money($cart->total_shipping)</p>
                        </div>
                        @endif
                        @if($cart->payment_method_id > 0)
                        <div class="flex justify-between">
                            <p class="font-medium">{{ __('shop::cart.side.payment_fee') }}</p>
                            <p class="font-medium">@money($cart->total_payment_fee)</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-between mt-2">
                        <p class="font-semibold">{{ __('shop::cart.side.total') }}</p>
                        <p class="font-semibold">@money($cart->total_pre_payment)</p>
                    </div>
                    {{--<div class="flex  w-full lg:max-w-sm rounded-lg overflow-hidden mt-4">
                        <input type="text" placeholder="Enter coupon"
                               class="w-full border border-[#E9E4E4] text-xs focus:outline-none  focus:border-primary overflow-hidden">
                        <button
                            class="bg-primary border border-primary text-white rounded-br-lg text-xs uppercase px-4 sm:px-8 lg:px-4 hover:bg-white hover:text-primary hover:border-primary transition-all ">
                            apply
                        </button>
                    </div>--}}
                    <div class="mt-8">
                        <button wire:click="onCheckout"
                           class="block w-full px-8 lg:px-2 xl:px-8 py-2 rounded text-center text-sm font-semibold bg-secondary hover:bg-black text-white transition duration-300">
                            {{ __('shop::cart.to_checkout') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <x-shop::partials.flash-alert type="info">{{ __('shop::cart.error.empty') }}</x-shop::partials.flash-alert>
    @endif
</div>
