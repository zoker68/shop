<div id="pagination_top">

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <x-partials.products.card-grid :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @endforeach
    </div>
    @if($products->count() == 0)
            <x-partials.flash-alert type="info" class="w-full col-span-2">{{ __('zoker68.shop::products.search.no_results') }}</x-partials.flash-alert>
    @endif

    {{ $products->links('components.partials.pagination') }}
</div>
