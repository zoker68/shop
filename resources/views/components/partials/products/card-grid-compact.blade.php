@props([
    'product',
    'inWishlist' => false,
])

<div class="w-full col-span-1 group">
    <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
        <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
            <img class="w-full h-[130px] object-contain flex-shrink-0" src="{{ $product->getCoverImage(300, 300) }}"
                 alt="{{ $product->name }}">
            {{--<span
                class="absolute top-0 left-0 px-2.5 py-2 bg-[#ED0020] rounded-tl-[5px] rounded-br-[5px] text-white text-[15px] font-medium uppercase z-20">hot</span>--}}
            <div
                class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                <a href="{{ route('product', $product) }}"
                        class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                        tabindex="0">
                    <svg width="20" height="20" viewBox="0 0 32 32">
                        <path fill="currentColor"
                              d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                    </svg>
                </a>
                <a wire:click.prevent="toggleWishlist('{{ $product->hash }}')" href="#"
                   class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                   tabindex="0">
                    <svg width="20" height="20" viewBox="0 0 256 256">
                        @if(!$inWishlist)
                        <path fill="currentColor"
                              d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                        @else
                            <path fill="currentColor"
                                  d="M128 234.6a15.3 15.3 0 0 1-10.9-4.5L36.1 149.7c-22.9-22.9-24.8-60.1-4.5-84.1a60.7 60.7 0 0 1 45.1-15.3a67.5 67.5 0 0 1 43.3 19.7L128 77.4l8.9-8.9c18.5-18.5 44.5-24.1 68.5-15.7a61.8 61.8 0 0 1 36.5 36.5c8.4 24-2.8 50-21.3 68.5l-81 81a15.3 15.3 0 0 1-10.9 4.5Z" />
                        @endif
                    </svg>
                </a>
            </div>
        </div>

        <div class="p-5 h-[125px] overflow-hidden relative">
            <a href="{{ route('product', $product) }}">
                <h4 class="text-secondary text-lg font-medium mb-[5px]">{{ $product->name }}</h4>
            </a>
            <div>
                <div>
                    <span class="text-primary mr-[5px] font-medium">@money($product->price)</span>
                    {{--<span class="text-sm text-[#687188] line-through font-medium">$55.45</span>--}}
                </div>

                <div class="flex items-center justify-start">
                    <div class="flex items-center">
                        <x-shop::partials.rating :rating="$product->reviews_avg_rating" class="items-center"/>
                    </div>
                    <p class="text-[13px] ml-[9px] text-[#687188]">({{ $product->reviews_count }})</p>
                </div>
            </div>
            <div
                class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                <button wire:click="addToCart('{{ $product->hash }}')" class="primary-btn hover:bg-white px-[15px]">{{ __('shop::products.add_to_cart') }}</button>
            </div>
        </div>
    </div>
</div>
