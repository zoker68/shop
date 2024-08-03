@props([
    /** @var \App\Models\Cart */
    'cart'
])

<h4 class="bg-secondary text-white px-3 py-2">{{ __('zoker.shop::checkout.side.cart.title') }}</h4>
<div class="border border-[#E9E4E4] px-4 py-6 mt-4">
    <h4 class="uppercase border-b border-[#E9E4E4] pb-2">{{ __('zoker.shop::checkout.side.cart.products') }}</h4>
    <div class="grid grid-cols-12 justify-between gap-y-5 gap-1pt-3">
        @foreach($cart->products as $item)
            <div class="col-span-7"><h5>{{ $item->product->name }}</h5></div>
            <div class="font-semibold">x{{ $item->quantity }}</div>
            <div class="font-semibold col-span-4 text-right">@money($item->product->price)</div>
        @endforeach
    </div>
    <div class="flex justify-between mt-4 pt-3 border-t border-[#E9E4E4]">
        <h5 class="font-semibold uppercase">{{ __('zoker.shop::checkout.side.cart.subtotal') }}</h5>
        <div class="font-semibold">@money($cart->total_products)</div>
    </div>
    <div class="flex justify-between mt-4 pt-3 border-t border-[#E9E4E4]">
        <div>
            <h5 class="font-semibold uppercase">{{ __('zoker.shop::checkout.side.cart.shipping_price') }}</h5>
            <p class="text-[#9F9F9F]">{{ optional($cart->shippingMethod)->name }}</p>
        </div>
        <div class="font-semibold">@money($cart->total_shipping)</div>
    </div>
    <div class="flex justify-between mt-4 pt-3 border-t border-[#E9E4E4]">
        <div>
            <h5 class="font-semibold uppercase">{{ __('zoker.shop::checkout.side.cart.payment_fee') }}</h5>
            <p class="text-[#9F9F9F]">{{ optional($cart->paymentMethod())->name }}</p>
        </div>
        <div class="font-semibold">@money($cart->total_payment_fee)</div>
    </div>
    <div class="flex justify-between mt-4 pt-3 border-t border-[#E9E4E4]">
        <h5 class="font-semibold uppercase">{{ __('zoker.shop::checkout.side.cart.total') }}</h5>
        <div class="font-semibold">@money($cart->total_pre_payment)</div>
    </div>
</div>
