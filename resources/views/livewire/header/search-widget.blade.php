<div>
    <div x-data="{isOpen:false}" class="relative hidden lg:block">
        <form action="{{ route('search') }}" method="get">
            <div @click.outside="isOpen=false"
                 class=" w-[535px] xl:w-[675px] flex">
                <!-- search categories -->
                <div
                    class="border-r border-secondary w-36 bg-white rounded-l-md h-[43px] flex justify-center items-center"
                wire:ignore>
                    <select class="nice-select all-category" wire:change="selectCategory($event.target.value)" name="category">
                        <option @selected(!$category) value="">{{ __('shop::layout.header.navbar.search.all_category') }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(isset($category) && $category->id == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                </div>
                <!-- search -->
                <div class="max-w-[250px] xl:max-w-[390px] h-auto flex-grow z-10">
                    <input @click="isOpen=true" type="text" placeholder="{{ __('shop::layout.header.navbar.search.placeholder') }}"
                           wire:model.live.debounce.250ms="search" name="search" autocomplete="off"
                           class="px-5 py-2.5 border-none text-sm w-full focus:ring-0 focus:outline-none leading-relaxed">
                </div>
                <!-- search btn -->
                <div class="w-[142px]">
                    <button class="bg-black hover:bg-white hover:text-secondary rounded-r-md w-full px-4 h-full text-white text-base font-medium font-poppins transition-all duration-300">
                        {{ __('shop::layout.header.navbar.search.submit') }}
                    </button>
                </div>
            </div>

            <div :class="isOpen ? 'opacitiy-100 visible mt-2.5' :'opacity-0 invisible mt-0'"
                 class="absolute left-0 top-14 w-full shadow bg-white rounded-b-[3px]  z-10 transition-all duration-300">
                @if ($result->count() > 0)
                <div class="h-auto overflow-auto">
                    @foreach ($result as $product)
                    <a href="{{ route('product', $product) }}"
                       class="flex items-center py-2 border-b border-[#ebebeb] hover:bg-[#f2f0f0] transition-all duration-300">
                        <div class="w-[90px] p-2.5">
                            <img src="{{ $product->getCoverImage(100, 100) }}" class="w-full h-[50px] object-contain"
                                 alt="product">
                        </div>
                        <div class="pl-2">
                            <h4 class="text-lg font-medium text-secondary mb-1.5">{{ $product->name }}</h4>
                            <div class="mb-[5px] font-medium leading-[22px]">
                                <span class="text-primary mr-[5px] price">@money($product->price)</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="overflow-y-auto p-2 items-center hover:bg-[#f2f0f0] transition duration-300">
                        <button type="submit" class="text-lg font-medium text-secondary">{{ __('shop::layout.header.navbar.search.show_more', ['total_count_result' => $result->total()-count($result)]) }}</button>
                    </div>
                </div>
                @elseif($search)
                <div class="p-5 text-center text-secondary">
                    <h4>{{ __('shop::layout.header.navbar.search.no_result') }}</h4>
                </div>
                @endif
            </div>
        </form>
    </div>


    <!-- mobile searchbar -->
    <div x-data x-show="$store.search.isSearch" x-transition:enter="transition ease-in-out duration-500"
         x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition ease-in-out duration-500" x-transition:leave-end="-translate-y-full opacity-100"
         :class="$store.search.isSearch ? 'opacity-100 visible' : 'opacity-0 invisible'" x-cloak
         class="fixed left-0 top-0 w-full h-full bg-white z-20 p-[20px] transition-all duration-500">
        <div class="relative">
            <p class="text-xs mb-3 text-[#8a8a8a]">{{ __('shop::layout.header.navbar.search.mobile.title') }}</p>
            <!-- close -->
            <button @click="$store.search.isSearch=false" class="absolute top-0 right-0 cursor-pointer text-secondary">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                </svg>
            </button>
        </div>
        <!-- search input -->
        <form action="{{ route('search') }}" class="relative">
            <div class="border-b border-[#c3c3c3] z-50">
                <input type="text" placeholder="{{ __('shop::layout.header.navbar.search.mobile.placeholder') }}"
                       wire:model.live.debounce.250ms="search" name="search"
                       class="w-full focus:outline-none  focus:ring-0 border-none pr-2.5 py-[5px] text-secondary text-lg">
            </div>
            <button class="absolute right-0 top-[8px] border-none bg-transparent">
                <svg width="20" height="20" viewBox="0 0 28 28">
                    <path fill="currentColor"
                          d="M11.5 2.75a8.75 8.75 0 0 1 6.695 14.384l6.835 6.836a.75.75 0 0 1-.976 1.133l-.084-.073l-6.836-6.835A8.75 8.75 0 1 1 11.5 2.75Zm0 1.5a7.25 7.25 0 1 0 0 14.5a7.25 7.25 0 0 0 0-14.5Z">
                    </path>
                </svg>
            </button>

        <!-- search product -->
        @if ($result->count() > 0)
            <div class="overflow-y-auto pt-2">
                @foreach ($result as $product)
                <a href="{{ route('product', $product) }}"
                   class="flex items-center border-b border-[#ebebeb] py-2 hover:bg-[#f2f0f0] transition duration-300">
                    <div class="w-[90px] px-2.5 py-1">
                        <img src="{{ $product->getCoverImage(50,50) }}" class="w-full h-[50px] object-contain flex-shrink-0"
                             alt="{{ $product->name }}">
                    </div>
                    <div class="pl-2">
                        <h4 class="text-lg font-medium mb-1.5 text-secondary">{{ $product->name }}</h4>
                        <div>
                            <span class="text-primary mr-[5px] leading-[22px] text-base font-medium price">@money($product->price)</span>
                            {{--<span class="text-sm text-[#687188] font-medium leading-[22px]">$55.45</span>--}}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="overflow-y-auto pt-2 items-center py-2 hover:bg-[#f2f0f0] transition duration-300">
                <button type="submit" class="text-lg font-medium text-secondary">{{ __('shop::layout.header.navbar.search.show_more', ['total_count_result' => $result->total()-count($result)]) }}</button>
            </div>

        @elseif($search)
            <div class="p-5 text-center text-secondary">
                <h4>{{ __('shop::layout.header.navbar.search.no_result') }}</h4>
            </div>
        @endif
        </form>
    </div>
    <!-- mobile searchbar end -->

</div>
