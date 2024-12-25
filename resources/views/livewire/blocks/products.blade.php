<div x-data class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        @if($data['template'] === 'default')
            <x-shop::partials.products.card-grid :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @else
            <x-shop::partials.products.card-grid-compact :product="$product" :inWishlist="in_array($product->id, $wishlist)" />
        @endif
    @endforeach
</div>
