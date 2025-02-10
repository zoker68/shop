<div class="col-span-1">
    <div :class="isOpen ? 'opacity-100 visible' : 'opacity-0 invisible'"
         class="lg:opacity-100 lg:visible transition-all duration-300 absolute bg-white top-[80px] left-0 lg:static w-[320px] shadow lg:w-full p-4 z-20">
        <div class="sm:hidden">
            <div class="flex justify-between items-center">
                <h4 class="text-xl uppercase">{{ __('shop::products.sort_by') }}</h4>
                <button @click="isOpen=false" class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="border-b pb-14 rounded mt-5">
                <select class="nice_select nice-select" x-on:change="$dispatch('changeSort', { sort: $event.target.value })">
                    <option value="" disabled selected>{{ __('shop::products.sort_by') }}</option>
                    @foreach($sortOptions as $key => $option)
                        <option value="{{ $key }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <form wire:change.debounce.600ms="filter()">
            <div class="mt-6 sm:mt-2">
                <x-shop::product-filter.subcategories :topCategory="$topCategory" :subCategories="$subCategories" :currentCategory="$category"/>

                <x-shop::product-filter.brands :brands="$brands"/>

                <x-shop::product-filter.price :priceRange="$priceRange" :priceStart="$priceStart"/>

                @foreach($properties as $property)
                    <x-shop::product-filter.property :property="$property" :filters="$filters"/>
                @endforeach

            </div>
        </form>
    </div>
</div>
