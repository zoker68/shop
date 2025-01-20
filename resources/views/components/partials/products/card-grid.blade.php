@props([
    'product',
    'inWishlist' => false,
])

<div class="col-span-1 overflow-hidden rounded-[3px] shadow-sm group">
    <div class="relative">
        <a href="{{ route('product', $product) }}">
            <img src="{{ $product->getCoverImage(300, 300) }}" class="w-full object-cover flex-shrink-0"
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
            <h4 class="text-lg leading-6 mb-1 text-secondary hover:text-primary font-medium transition duration-200">{{ $product->name }}</h4>
        </a>
        <p class="text-[15px] text-[#464545] mb-2.5">{{ $product->description_short }}</p>
        <div class="mr-[5px]">
            <span class="text-primary text-xl font-semibold leading-[22px]">@money($product->price)</span>
        </div>
        <div class="flex items-center justify-start gap-[9px]">
            <x-shop::partials.rating :rating="$product->reviews_avg_rating" class="items-center"/>
            <p class="text-[15px] text-[#464545]">({{ $product->reviews_count }})</p>
        </div>
    </div>
    <div class="w-full">
        <button
            class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500"
            wire:click="addToCart('{{ $product->hash }}')"
        >
            <span class="text-white btn-icon transition duration-500">
                <svg width="16" height="16" viewBox="0 0 32 32">
                    <circle cx="10" cy="28" r="2" fill="currentColor"/>
                    <circle cx="24" cy="28" r="2" fill="currentColor"/>
                    <path fill="currentColor"
                          d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z"/>
                </svg>
            </span>
            {{ __('shop::products.add_to_cart') }}
        </button>
    </div>
</div>
