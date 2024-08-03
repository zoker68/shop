<div id="pagination_top">

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <x-shop::partials.products.card-grid :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @endforeach
    </div>
    @if($products->count() == 0)
            <x-shop::partials.flash-alert type="info" class="w-full col-span-2">{{ __('shop::products.search.no_results') }}</x-shop::partials.flash-alert>
    @endif

    {{ $products->links('shop::components.partials.pagination') }}
</div>
