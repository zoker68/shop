<x-shop::layouts.account>
    <div class="col-span-12 lg:col-span-9">
        @forelse($orders as $order)
            <x-shop::partials.account.order-card :order="$order"/>
        @empty
            <x-shop::partials.flash-alert type="info">{{ __('shop::auth.orders.no_orders') }}</x-shop::partials.flash-alert>
        @endforelse
    </div>
</x-shop::layouts.account>
