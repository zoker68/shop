<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="$breadcrumbs"/>

    <livewire:shop.checkout :cart="$cart"/>

    @push('scripts')
        <script>
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                'event': 'begin_checkout',
                'ecommerce': {
                    'items': [
                        @foreach($cart->products as $product)
                        {
                            'item_name': '{{ $product->product->name }}',
                            'item_id': '{{ $product->product->hash }}',
                            'price': {{ $product->product->price / currency()->getSubunit() }},
                            'quantity': {{ $product->quantity }}
                        }
                        @if(!$loop->last) , @endif
                        @endforeach
                    ]
                }
            });
        </script>
    @endpush
</x-shop::layouts.app>
