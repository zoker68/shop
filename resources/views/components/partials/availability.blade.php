@props([
    /** @var \App\Models\Product */
    'product'
])

@if($product->stock > 0)
    <span class="text-[#08B54C] font-medium">{{ __('product.in_stock') }}</span>
@else
    <span class="text-red-500 font-medium">{{ __('product.out_of_stock') }}</span>
@endif
