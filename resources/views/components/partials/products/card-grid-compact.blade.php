@props([
    'product',
    'inWishlist' => false,
])

<div class="w-full col-span-1 group">
    <div class="border border-[#EDECEC] hover:shadow-lg rounded-md overflow-hidden transition-all duration-300">
        <div class="relative px-[30px] py-[30px] sm:py-5">
            <img class="w-full h-[130px] object-contain flex-shrink-0 group-hover:scale-110 transiton-all duration-300" src="{{ $product->getCoverImage(300, 300) }}"
                 alt="{{ $product->name }}">
            {{--<span
                class="absolute top-0 left-0 px-2.5 py-2 bg-[#ED0020] rounded-tl-[5px] rounded-br-[5px] text-white text-[15px] font-medium uppercase z-20">hot</span>--}}
            <div
                class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#ffffffdb] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                <a href="{{ route('product', $product) }}"
                        class="mx-2 h-10 w-10 bg-[#666666] hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                        tabindex="0">
                    <svg width="20" height="20" viewBox="0 0 32 32">
                        <path fill="currentColor"
                              d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                    </svg>
                </a>
                <a wire:click.prevent="toggleWishlist('{{ $product->hash }}')" href="#"
                   class="mx-2 h-10 w-10 bg-[#666666] hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
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

        <div class="p-5 h-full relative bg-[#f3f3f3] z-30">
            <a href="{{ route('product', $product) }}">
                <h4 class="text-secondary text-lg font-semibold leading-tight mb-[5px]">{{ $product->name }}</h4>
            </a>
            <div>
                <div>
                    <span class="text-[#666666] mr-[5px] font-semibold price">@money($product->price)</span>
                    {{--<span class="text-sm text-[#666666] line-through font-medium">$55.45</span>--}}
                </div>

                <div class="flex items-center justify-start">
                    <div class="flex items-center">
                        <x-shop::partials.rating :rating="$product->reviews_avg_rating" class="items-center"/>
                    </div>
                    <p class="text-[13px] ml-[9px] text-[#687188]">({{ $product->reviews_count }})</p>
                </div>
            </div>
            <div
                class="absolute right-2 bottom-2 -mr-10 group-hover:mr-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                <button wire:click="addToCart('{{ $product->hash }}')" class="h-12 w-12 bg-secondary hover:bg-accent text-white rounded-full flex justify-center items-center transition-all duration-300"><!-- {{ __('shop::products.add_to_cart') }} -->
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.543 9.517a.75.75 0 1 0-1.086-1.034l-2.314 2.43l-.6-.63a.75.75 0 1 0-1.086 1.034l1.143 1.2a.75.75 0 0 0 1.086 0z"/>
                        <path fill="currentColor" fill-rule="evenodd" d="M1.293 2.751a.75.75 0 0 1 .956-.459l.301.106c.617.217 1.14.401 1.553.603c.44.217.818.483 1.102.899c.282.412.399.865.452 1.362l.011.108H17.12c.819 0 1.653 0 2.34.077c.35.039.697.101 1.003.209c.3.105.631.278.866.584c.382.496.449 1.074.413 1.66c-.035.558-.173 1.252-.338 2.077l-.01.053l-.002.004l-.508 2.47c-.15.726-.276 1.337-.439 1.82c-.172.51-.41.96-.837 1.308c-.427.347-.916.49-1.451.556c-.505.062-1.13.062-1.87.062H10.88c-1.345 0-2.435 0-3.293-.122c-.897-.127-1.65-.4-2.243-1.026c-.547-.576-.839-1.188-.985-2.042c-.137-.8-.15-1.848-.15-3.3V7.038c0-.74-.002-1.235-.043-1.615c-.04-.363-.109-.545-.2-.677c-.087-.129-.22-.25-.524-.398c-.323-.158-.762-.314-1.43-.549l-.26-.091a.75.75 0 0 1-.46-.957M5.708 6.87v2.89c0 1.489.018 2.398.13 3.047c.101.595.274.925.594 1.263c.273.288.65.472 1.365.573c.74.105 1.724.107 3.14.107h5.304c.799 0 1.33-.001 1.734-.05c.382-.047.56-.129.685-.231s.24-.26.364-.625c.13-.385.238-.905.4-1.688l.498-2.42v-.002c.178-.89.295-1.482.322-1.926c.026-.422-.04-.569-.101-.65a.6.6 0 0 0-.177-.087a3.2 3.2 0 0 0-.672-.134c-.595-.066-1.349-.067-2.205-.067zM5.25 19.5a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5m6.75-.75a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
