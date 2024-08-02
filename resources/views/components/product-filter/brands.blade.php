@props([
    /** @var \mixed */
    'brands'
])

@if ($brands->count())
    <div class="pb-4 border-b border-[#E9E4E4] mb-4">
        <h4 class="text-xl font-medium mb-3 text-secondary uppercase">{{ __('product-filter.brands') }}</h4>
        <div class="space-y-3">
            @foreach($brands as $brand)
                <x-product-filter.brand :brand="$brand"/>
            @endforeach
        </div>
    </div>
@endif
