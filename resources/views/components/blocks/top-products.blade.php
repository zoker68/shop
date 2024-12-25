<section {{ $attributes->class(['pb-14']) }}>
    <div class="container">
        <h2 class="text-[22px] sm:text-[32px] font-medium text-secondary">Top Ranking</h2>
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($topRanking as $top)

                <div class="col-span-1 pr-3">{{--lg:hidden xl:block--}}
                    <h4 class="text-[20px] sm:text-lg font-medium mt-7"><a href="{{ route('category', $top['category']) }}">{{ $top['category']->name }}</a></h4>
                    @foreach($top['products'] as $product)
                        <div class="sm:flex items-center mt-5">
                            <div class="w-full sm:w-[105px] bg-[#F2F0F0] rounded-md p-2.5 relative">
                                <a href="{{ route('product', $product) }}">
                                    <img loading="lazy" src="{{ $product->getCoverImage(75, 75) }}"
                                         class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                                </a>
                                @if($show_index)
                                    <span
                                        class="absolute top-0 right-0 w-6 h-[18px] bg-primary text-center leading-5 text-white font-bold text-xs rounded-tr-md rounded-bl-md">{{ $loop->iteration }}</span>
                                @endif
                            </div>
                            <div class="sm:pl-4 mt-3 sm:mt-0">
                                <a href="{{ route('product', $product) }}">
                                    <h4 class="text-base font-medium text-secondary mb-1.5">{{ $product->name }}</h4>
                                </a>
                                <div class="font-medium">
                                    <span class="text-primary mr-1">@money($product->price)</span>
                                    {{--<span class="text-[#687188] text-sm font-medium line-through">$300.45</span>--}}
                                </div>
                                <div>
                                    <div class="flex items-center justify-start">
                                        <x-shop::partials.rating :rating="$product->reviews_avg_rating" size="15"/>
                                        <p class="text-xs ml-2 text-[#687188]">({{ $product->reviews_count }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endforeach

        </div>
    </div>
</section>
