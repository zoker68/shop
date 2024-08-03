<div x-data="{isOpen:false}" class="relative hidden lg:block">
        <form action="{{ route('search') }}" method="get">
    <div @click.outside="isOpen=false"
         class="border border-primary rounded-md w-[535px] xl:w-[675px] flex">
        <!-- search categories -->
        <div
            class="border-r border-secondary w-36 bg-white rounded-l-md h-[43px] flex justify-center items-center"
        wire:ignore>
            <select class="nice-select all-category z-20" wire:change="selectCategory($event.target.value)" name="category">
                <option @selected(!$category) value="">{{ __('zoker.shop::layout.header.navbar.search.all_category') }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(isset($category) && $category->id == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>

        </div>
        <!-- search -->
        <div class="max-w-[250px] xl:max-w-[390px] h-auto flex-grow">
            <input @click="isOpen=true" type="text" placeholder="{{ __('zoker.shop::layout.header.navbar.search.placeholder') }}"
                   wire:model.live.debounce.250ms="search" name="search"
                   class="px-5 py-2.5 border-none text-sm w-full focus:ring-0 focus:outline-none leading-relaxed">
        </div>
        <!-- search btn -->
        <div class="w-[142px]">
            <button class="bg-secondary rounded-r-md w-full px-4 py-2.5 text-white text-base font-medium">
                {{ __('zoker.shop::layout.header.navbar.search.submit') }}
            </button>
        </div>
    </div>
        </form>
    <div :class="isOpen ? 'opacitiy-100 visible mt-2.5' :'opacity-0 invisible mt-0'"
         class="absolute left-0 top-14 w-full shadow bg-white rounded-b-[3px]  z-10 transition-all duration-300">
        @if ($result->count() > 0)
        <div class="h-auto overflow-auto">
            @foreach ($result as $product)
            <a href="{{ route('product', $product) }}"
               class="flex items-center py-2 border-b border-[#ebebeb] hover:bg-[#f2f0f0] transition-all duration-300">
                <div class="w-[90px] p-2.5">
                    <img src="{{ $product->getCoverImage() }}" class="w-full h-[50px] object-contain"
                         alt="product">
                </div>
                <div class="pl-2">
                    <h4 class="text-lg font-medium text-secondary mb-1.5">{{ $product->name }}</h4>
                    <div class="mb-[5px] font-medium leading-[22px]">
                        <span class="text-primary mr-[5px]">@money($product->price)</span>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        @elseif($search)
        <div class="p-5 text-center text-secondary">
            <h4>{{ __('zoker.shop::layout.header.navbar.search.no_result') }}</h4>
        </div>
        @endif
    </div>
</div>
