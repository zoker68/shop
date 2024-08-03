<div id="pagination_top">
    <div class="mt-6">
        @foreach($products as $product)
            <x-shop::partials.products.card-line :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @endforeach
    </div>

    @if($products->count() == 0)
        <x-shop::partials.flash-alert type="info" class="w-full col-span-2">{{ __('shop::products.search.no_results') }}</x-shop::partials.flash-alert>
    @endif

    {{ $products->links('shop::components.partials.pagination') }}
</div>
