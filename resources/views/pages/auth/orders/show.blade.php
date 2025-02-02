<x-shop::layouts.account>
    <div class="col-span-12 lg:col-span-9">
        <div class="box_shadow px-6 py-8">
            <h4 class="text-lg">Order Details</h4>
            <!-- order details -->
            <div class="grid grid-cols-4 gap-5 sm:gap-0 flex-wrap sm:flex-nowrap justify-between items-center mt-6">
                <div>
                    <h5>{{ __('shop::auth.orders.show.number') }}</h5>
                    <p>{{ $order->hash }}</p>
                </div>
                <div>
                    <h5>{{ __('shop::auth.orders.show.general_status') }}</h5>
                    <p style="color: {{ $order->generalStatus->hex_color }}">{{ $order->generalStatus->name }}</p>
                </div>
                <div>
                    <h5>{{ __('shop::auth.orders.show.payment_status') }}</h5>
                    <p style="color: {{ $order->paymentStatus->hex_color }}">{{ $order->paymentStatus->name }}</p>
                </div>
                <div>
                    <h5>{{ __('shop::auth.orders.show.shipping_status') }}</h5>
                    <p style="color: {{ $order->shippingStatus->hex_color }}">{{ $order->shippingStatus->name }}</p>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-5 sm:gap-0 flex-wrap sm:flex-nowrap justify-between items-center mt-6">
                <div>
                    <h5>{{ __('shop::auth.orders.show.purchased') }}</h5>
                    <p>{{ $order->created_at->format('d.m.Y') }}</p>
                </div>
                <div>
                    <h5>{{ __('shop::auth.orders.show.payed') }}</h5>
                    <p>{{ $order->paid_at?->format('d.m.Y') ?? '-' }}</p>
                </div>
                <div>
                    <h5>{{ __('shop::auth.orders.show.shipped') }}</h5>
                    <p>{{ $order->shipped_at?->format('d.m.Y') ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="gap-6 mt-6 px-3 py-3 bg-white box_shadow">
            <!-- product details -->
            @foreach($order->products as $product)
                <div class="grid grid-cols-12 gap-6 items-center">
                    <div class="col-span-2 px-3 py-2">
                        <img loading="lazy" src="{{ $product->product->getCoverImage(100, 100) }}" class="h-[50px]"
                             alt="{{ $product->product->name }}">
                    </div>
                    <div class="col-span-4">
                        <h5><a href="{{ route('product', $product->product) }}" class="hover:text-primary">{{ $product->product->name }}</a></h5>
                    </div>
                    <div class="col-span-2">
                        <h5>@money($product->product->price)</h5>
                    </div>
                    <div>
                        <h5>x{{ $product->quantity }}</h5>
                    </div>
                    <div class="col-span-2">
                        <h5>@money($product->total)</h5>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-12 gap-6 mt-6">
            <div class="col-span-12 lg:col-span-4 box_shadow px-8 py-6">
                <div>
                    <div>
                        <h4 class="text-lg">{{ __('shop::auth.orders.show.shipping_address') }}</h4>
                    </div>
                    <div class="mt-4">
                        <p>{{ $order->user_data['name'] }} {{ $order->user_data['surname'] }}</p>
                        <p>{{ $order->shipping_address_data['address'] }}</p>
                        <p>{{ $order->shipping_address_data['city'] }}, {{ $order->shipping_address_data['zip'] }}</p>
                        <p>{{ $order->user_data['phone'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-4 box_shadow px-8 py-6">
                <div>
                    <div>
                        <h4 class="text-lg">{{ __('shop::auth.orders.show.billing_address_data') }}</h4>
                    </div>
                    <div class="mt-4">
                        <p>{{ $order->billing_address_data['address'] }}</p>
                        <p>{{ $order->billing_address_data['city'] }}, {{ $order->billing_address_data['zip'] }}</p>
                        @if (isset($order->user_data['company']))<p>{{ $order->user_data['company'] }}</p>@endif
                        @if (isset($order->user_data['vat']))<p>{{ $order->user_data['vat'] }}</p>@endif

                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-4 box_shadow px-8 py-6">
                <div>
                    <div>
                        <h4 class="text-lg">{{ __('shop::auth.orders.show.summary') }}</h4>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <p>{{ __('shop::auth.orders.show.total_products') }}</p>
                            <p class="font-medium">@money($order->total_products)</p>
                        </div>
                        <div class="flex justify-between">
                            <p>{{ __('shop::auth.orders.show.total_shipping') }}</p>
                            <p class="font-medium">@money($order->total_shipping)</p>
                        </div>
                        <div class="flex justify-between">
                            <p>{{ __('shop::auth.orders.show.total_payment') }}</p>
                            <p class="font-medium">@money($order->total_payment_fee)</p>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between">
                            <p class="font-medium">{{ __('shop::auth.orders.show.total_pre_payment') }}</p>
                            <p class="font-medium">@money($order->total_pre_payment)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts.account>
