@props([
    'product',
    'inWishlist' => false,
])

<div class="col-span-1 overflow-hidden rounded-md flex flex-col justify-between height-full border border-[#EDECEC] hover:shadow-lg group transition-all duration-300">
    <div>
        <div class="relative">
            <a href="{{ route('product', $product) }}">
                <img src="{{ $product->getCoverImage(300, 300) }}" class="scale-95 w-full object-cover flex-shrink-0 group-hover:scale-100 transition-all duration-300"
                alt="{{ $product->name }}">
            </a>
            {{--<div
                class="absolute top-[15px] left-[15px] p-2 rounded-[3px] bg-[#dc3545] text-[15px] text-white leading-[18px] z-10">
                HOT</div>--}}
            <div
                wire:click="toggleWishlist('{{ $product->hash }}')"
                class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-2 text-primary flex items-center justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    @if(!$inWishlist)
                        <path fill="currentColor"
                            d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828zm0-1.354q2.4-2.17 3.95-3.716t2.45-2.685t1.25-2.015Q20 9.006 20 8.15q0-1.5-1-2.5t-2.5-1q-1.194 0-2.204.682T12.49 7.385h-.978q-.817-1.39-1.817-2.063q-1-.672-2.194-.672q-1.48 0-2.49 1T4 8.15q0 .856.35 1.734t1.25 2.015t2.45 2.675T12 18.3m0-6.825"/>
                    @else
                        <path fill="currentColor"
                            d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828z"/>
                    @endif
                </svg>
            </div>
        </div>
        <div class="p-4">
            <a href="{{ route('product', $product) }}">
                <h4 class="text-lg leading-6 mb-3 text-secondary hover:text-black font-semibold transition duration-200">{{ $product->name }}</h4>
            </a>
            <p class="text-[15px] text-[#666666] leading-normal mb-3">{{ $product->description_short }}</p>
        </div>
    </div>
    <div class="w-full">
        <div class="px-4">
            <span class="text-primary text-xl font-semibold leading-[22px] price">@money($product->price)</span>
        </div>
        <div class="px-4 pb-6 flex items-center justify-start gap-[9px]">
            <x-shop::partials.rating :rating="$product->reviews_avg_rating" class="items-center"/>
            <p class="text-[15px] text-[#464545]">({{ $product->reviews_count }})</p>
        </div>
        <button
            class="btn btn-primary-product w-full normal-case !rounded-t-none text-base gap-1.5 px-4 !py-3 rounded-b-md flex items-center justify-center transition-all duration-500 disabled:opacity-50 disabled:cursor-not-allowed"
            wire:click="addToCart('{{ $product->hash }}')"
            @if(!$product->stock) disabled @endif
        >
            <span class="text-white btn-icon transition duration-500">
<!--                 <svg width="16" height="16" viewBox="0 0 32 32">
                    <circle cx="10" cy="28" r="2" fill="currentColor"/>
                    <circle cx="24" cy="28" r="2" fill="currentColor"/>
                    <path fill="currentColor"
                          d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z"/>
                </svg> -->
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M15.543 9.517a.75.75 0 1 0-1.086-1.034l-2.314 2.43l-.6-.63a.75.75 0 1 0-1.086 1.034l1.143 1.2a.75.75 0 0 0 1.086 0z"/>
                    <path fill="currentColor" fill-rule="evenodd" d="M1.293 2.751a.75.75 0 0 1 .956-.459l.301.106c.617.217 1.14.401 1.553.603c.44.217.818.483 1.102.899c.282.412.399.865.452 1.362l.011.108H17.12c.819 0 1.653 0 2.34.077c.35.039.697.101 1.003.209c.3.105.631.278.866.584c.382.496.449 1.074.413 1.66c-.035.558-.173 1.252-.338 2.077l-.01.053l-.002.004l-.508 2.47c-.15.726-.276 1.337-.439 1.82c-.172.51-.41.96-.837 1.308c-.427.347-.916.49-1.451.556c-.505.062-1.13.062-1.87.062H10.88c-1.345 0-2.435 0-3.293-.122c-.897-.127-1.65-.4-2.243-1.026c-.547-.576-.839-1.188-.985-2.042c-.137-.8-.15-1.848-.15-3.3V7.038c0-.74-.002-1.235-.043-1.615c-.04-.363-.109-.545-.2-.677c-.087-.129-.22-.25-.524-.398c-.323-.158-.762-.314-1.43-.549l-.26-.091a.75.75 0 0 1-.46-.957M5.708 6.87v2.89c0 1.489.018 2.398.13 3.047c.101.595.274.925.594 1.263c.273.288.65.472 1.365.573c.74.105 1.724.107 3.14.107h5.304c.799 0 1.33-.001 1.734-.05c.382-.047.56-.129.685-.231s.24-.26.364-.625c.13-.385.238-.905.4-1.688l.498-2.42v-.002c.178-.89.295-1.482.322-1.926c.026-.422-.04-.569-.101-.65a.6.6 0 0 0-.177-.087a3.2 3.2 0 0 0-.672-.134c-.595-.066-1.349-.067-2.205-.067zM5.25 19.5a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5m6.75-.75a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5" clip-rule="evenodd"/>
                </svg>
            </span>
            @if($product->stock)
            {{ __('shop::products.add_to_cart') }}
            @else
            {{ __('shop::products.out_of_stock') }}
            @endif
        </button>
    </div>
</div>
