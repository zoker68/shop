@props([
    'order',
])
<div class="box_shadow px-6 py-8">
    <div class="text-center flex justify-between sm:items-center mt-4 md:mt-0">
        <div class="flex gap-3 justify-center">
            @foreach($order->products as $product)
                @if ($loop->index < 6)
                    <img class="h-[50px] @if (!$loop->first) hidden sm:block @endif" src="{{ $product->product->getCoverImage() }}" alt="{{ $product->product->name }}">
                @endif
            @endforeach
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('account.orders.show', $order) }}"
               class="border border-primary text-primary text-sm font-medium px-2 sm:px-4 py-1 sm:py-2 rounded hover:bg-primary hover:text-white transition duration-300">
                {{ __('zoker.shop::order.card.show_link') }}
            </a>
        </div>
    </div>
    <div class="flex flex-wrap gap-5 justify-between items-center mt-6">
        <div>
            <h5>{{ __('zoker.shop::order.card.number') }}</h5>
            <p>{{ $order->hash }}</p>
        </div>
        <div>
            <h5>{{ __('zoker.shop::order.card.purchased') }}</h5>
            <p>{{ $order->created_at->format('d.m.Y') }}</p>
        </div>
        <div>
            <h5>{{ __('zoker.shop::order.card.payed') }}</h5>
            <p>{{ $order->paid_at?->format('d.m.Y') ?? '-' }}</p>
        </div>
        <div>
            <h5>{{ __('zoker.shop::order.card.shipped') }}</h5>
            <p>{{ $order->shipped_at?->format('d.m.Y') ?? '-' }}</p>
        </div>
        <div>
            <h5>{{ __('zoker.shop::order.card.total') }}</h5>
            <p>@money($order->total_pre_payment)</p>
        </div>
        <div>
            <h5>{{ __('zoker.shop::order.card.status') }}</h5>
            <p style="color: {{ $order->generalStatus->hex_color }}">{{ $order->generalStatus->name }}</p>
        </div>
    </div>
</div>
