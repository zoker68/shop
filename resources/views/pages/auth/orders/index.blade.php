<x-layouts.account>
    <div class="col-span-12 lg:col-span-9">
        @forelse($orders as $order)
            <x-partials.account.order-card :order="$order"/>
        @empty
            <x-partials.flash-alert type="info">{{ __('zoker.shop::auth.orders.no_orders') }}</x-partials.flash-alert>
        @endforelse
    </div>
</x-layouts.account>
