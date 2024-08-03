@props([
    'priceRange',
    'priceStart'
])
<div class="pb-4 border-b border-[#E9E4E4] mb-4">
    <h4 class="text-xl font-medium  text-secondary uppercase">{{ __('zoker68.shop::product-filter.price') }}</h4>
    <div wire:ignore>
        <span id="rangeValue-propertyprice" class="block relative text-center text-xl font-semibold"></span>
        <div class="range-filter" id="priceRangeFilter" data-min="{{ $priceRange['min'] }}"
             data-set-min="{{ $priceStart['min'] }}"
             data-max="{{ $priceRange['max'] }}" data-set-max="{{ $priceStart['max'] }}" data-prop-id="price"></div>
    </div>
</div>
