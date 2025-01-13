<div>
    <!-- Cart -->
<button @click="$store.cart.isCart=true"
        class="relative text-secondary flex flex-col justify-center items-center text-center">
                <span class="relative block text-secondary">
                    <svg width="22" height="22" viewBox="0 0 32 32">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                           stroke-width="2">
                            <path d="M6 6h24l-3 13H9m18 4H10L5 2H2" />
                            <circle cx="25" cy="27" r="2" />
                            <circle cx="12" cy="27" r="2" />
                        </g>
                    </svg>
                </span>
    <span class="text-[11px] leading-[10px] mt-1 text-secondary">{{ __('shop::layout.header.navbar.mobile.cart') }}</span>
    <span
        class="absolute text-white bg-primary text-[11px] rounded-full w-[18px] h-[18px] leading-[18px] -right-1 -top-[8px]">{{ $cartCountProducts }}</span>
</button>

<!-- mobile cart -->
<div x-data x-show="$store.cart.isCart" :class="$store.cart.isCart ? 'opacity-100 visible' : 'opacity-0 invisible'"
     x-cloak
     class="lg:hidden fixed inset-0 w-full h-full z-30 overflow-hidden bg-[#00000070] cursor-default transition-all duration-500">

    <div x-show="$store.cart.isCart" x-transition:enter="transition ease-in-out duration-500"
         x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in-out duration-500"
         x-transition:leave-end="-translate-x-full opacity-100" @click.away="$store.cart.isCart=false"
         class="relative w-[320px] h-full overflow-y-auto bg-white flex flex-col transition-all duration-500">
        <h5 class="text-center bg-primary text-white py-[14px] text-xl relative mb-2">
            {{ __('shop::layout.header.cart.title') }}
            <button @click="$store.cart.isCart=false"
                    class="absolute top-[17px] right-[15px] text-white text-center cursor-pointer" id="CartClose">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                </svg>
            </button>
        </h5>

        <div class="p-4 flex-grow flex flex-col">
            <div class="mb-3 border-b border-[#d8d8d8]">
                <h4 class="text-base mb-1.5 font-medium text-secondary">{{ trans_choice('shop::layout.header.cart.items', $cartCountProducts) }}</h4>
            </div>
            <div>
                @foreach($cart->products as $item)
                <a href="{{ route('product', $item->product) }}" class="flex relative pr-5 mb-4">
                    <a wire:click="removeFromCart('{{ $item->product->hash }}')">
                        <span
                            class="absolute right-0 cursor-pointer text-secondary hover:text-primary transition duration-300">
                            <svg width="16" height="16" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                            </svg>
                        </span>
                    </a>
                    <div class="flex-shrink-0">
                        <img src="{{ $item->product->getCoverImage(75, 75) }}" class="w-[75px] h-[60px] object-contain" alt="product">
                    </div>
                    <div class="flex-grow pl-4">
                        <h5 class="text-base text-secondary font-medium hover:text-primary transition duration-300">
                            {{ $item->product->name }}
                        </h5>
                        <p class="text-sm text-[#464545]">x{{ $item->quantity }} <span class="ml-2 text-sm text-[#464545]">@money($item->price)</span>
                        </p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-auto">
                <div class="mt-4 pt-4 border-t border-[#d8d8d8] flex justify-between">
                    <h4 class="text-base font-medium text-secondary">{{ __('shop::layout.header.cart.sub_total') }}:</h4>
                    <h4 class="text-base font-medium text-secondary">@money($cart->total_products)</h4>
                </div>
                <div class="mt-4 flex gap-4">
                    <a href="{{ route('cart') }}" class="primary-btn px-2 py-[9px] w-1/2 text-sm">{{ __('shop::layout.header.cart.to_cart') }}</a>
                    <a href="{{ route('checkout') }}"
                       class="primary-btn px-2 py-[9px] w-1/2 bg-white hover:bg-primary text-primary hover:text-white text-sm">{{ __('shop::layout.header.cart.checkout') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile cart end -->
</div>
