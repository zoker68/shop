<div id="pagination_top">
    <div class="mt-6">
        @foreach($products as $product)
            <x-partials.products.card-line :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @endforeach
    </div>

    @if($products->count() == 0)
        <x-partials.flash-alert type="info" class="w-full col-span-2">{{ __('zoker.shop::products.search.no_results') }}</x-partials.flash-alert>
    @endif

    {{ $products->links('components.partials.pagination') }}
</div>
