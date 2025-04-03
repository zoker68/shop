<section {{ $attributes->class(['pb-14']) }}>
    <div class="container">
        @if ($heading)
            <h2 class="text-[28px] mb-6 text-secondary">{{ $heading }}</h2>
        @endif
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
            @foreach($topRanking as $top)

                <div class="col-span-1 pr-3">{{--lg:hidden xl:block--}}
                    <h4 class="text-[20px] sm:text-lg font-medium mt-7"><a href="{{ route('category', $top['category']) }}">{{ $top['category']->name }}</a></h4>
                    @foreach($top['products'] as $product)
                        <div class="group sm:flex mt-5 border-b border-[#EDECEC] pb-5 last:border-b-0">
                            <div class="w-full sm:w-[105px] flex-shrink-0 rounded-md relative">
                                <a href="{{ route('product', $product) }}">
                                    <img loading="lazy" src="{{ $product->getCoverImage(100, 100) }}"
                                         class="w-full h-[100px] object-contain flex-shrink-0 scale-95 group-hover:scale-100 transition-all duration-300" alt="product">
                                </a>
                                @if($show_index)
                                    <span
                                        class="absolute top-0 right-0 w-6 h-6 flex justify-center items-center bg-black group-hover:bg-secondary text-white font-bold text-xs rounded-full transition-all duration-300">{{ $loop->iteration }}</span>
                                @endif
                            </div>
                            <div class="sm:pl-4 mt-3 sm:mt-0">
                                <a href="{{ route('product', $product) }}">
                                    <h4 class="text-sm font-semibold text-secondary group-hover:text-black mb-1.5 transition-all duration-300">{{ $product->name }}</h4>
                                </a>
                                <div class="font-medium">
                                    <span class="text-primary mr-1 price">@money($product->price)</span>
                                    {{--<span class="text-primary text-sm font-medium line-through">$300.45</span>--}}
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
