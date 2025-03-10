<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="$product->getBreadcrumbs()"/>

    <livewire:shop.product :product="$product"/>

    @push('scripts')
        <script>
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                'event': 'view_item',
                'ecommerce': {
                    'items': [{
                        'item_name': '{{ $product->name }}',
                        'item_id': '{{ $product->hash }}',
                        'price': {{ $product->price / currency()->getSubunit() }},
                    }]
                }
            });
        </script>
    @endpush

</x-shop::layouts.app>
