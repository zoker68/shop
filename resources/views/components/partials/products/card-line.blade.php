@props([
    'product',
    'inWishlist' => false,
])


<div class="border border-[#E9E4E4] mb-5 grid grid-cols-3">
    <div class="col-span-3 md:col-span-1 md:pr-3">
        <div class="bg-[#fafafa] min-h-[260px] p-3 flex items-center justify-center">
            <div class="lp_img">
                <a href="{{ route('product', $product) }}">
                <img src="{{ $product->getCoverImage() }}"
                     class="w-[200px] h-[200px] object-contain flex-shrink-0" alt="{{ $product->name }}">
                </a>
            </div>
        </div>
    </div>

    <div class="col-span-3 md:col-span-2 pl-3">
        <div class="py-3 pr-3">
            <a href="{{ route('product', $product) }}">
                <h5 class=" text-xl leading-[33px] mb-1.5 text-[#000] font-medium">{{ $product->name }}</h5>
            </a>

            <div>
                <div class="font-medium mb-1.5">
                    <span class="text-primary text-lg font-medium leading-[22px] mr-[5px]">@money($product->price)</span>
                    {{--<span class="text-[#687188] text-base font-medium line-through">$55.45</span>--}}
                </div>

                <div class="flex items-center justify-start gap-[9px]">
                    <x-partials.rating :rating="$product->reviews_avg_rating" class="items-center gap-1"/>
                    <p class="text-sm text-[#687188]">({{ $product->reviews_count }})</p>
                </div>
            </div>

            <p class="text-base leading-6 mt-3 mb-4 text-secondary">
                @if (strlen($product->description) > 200)
                    {{ substr($product->description, 0, 200) }}...
                @else
                    {{ $product->description }}
                @endif
            </p>
            <div class="mt-4 flex gap-4">
                <button wire:click="addToCart('{{ $product->hash }}')"
                   class="primary-btn px-[15px] py-2.5 rounded-[5px] min-w-[135px] mr-2.5 font-medium text-[13px] flex items-center gap-2 group">
                                    <span class="text-white group-hover:text-primary transition duration-300"><svg
                                                width="14" height="14" viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607L1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479l9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4a2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4a2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2a1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2a1 1 0 0 1 0-2z"/>
                                        </svg></span>
                    {{ __('zoker.shop::products.add_to_cart') }}
                </button>
                <button wire:click.prevent="toggleWishlist('{{ $product->hash }}')"
                   class="primary-btn px-[15px] py-2.5 rounded-[5px] min-w-[135px] mr-2.5 font-medium text-[13px] bg-white hover:bg-primary text-primary hover:text-white">
                    <span class="text-primary group-hover:text-white transition duration-300"></span>
                    @if($inWishlist)
                        {{ __('zoker.shop::products.in_wishlist') }}
                    @else
                        {{ __('zoker.shop::products.add_to_wishlist') }}
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>
