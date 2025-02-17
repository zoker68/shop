<x-layouts.mail>
    <x-slot:header>{{ __('shop::order.confirmation.mail.customer.header') }}</x-slot:header>

    <p class="pt-3">{{ __('shop::order.confirmation.mail.customer.hello', ['name' => $order->user_data['name'], 'surname' => $order->user_data['surname']]) }}</p>

    <p class="pt-3">
        {{ __('shop::order.confirmation.mail.customer.thank_you', ['order_hash' => $order->hash]) }}
    </p>

    <p>
        {{ __('shop::order.confirmation.mail.customer.details') }}
    </p>
    <ul>
        <li>{{ __('shop::order.confirmation.mail.customer.detail_order_hash', ['order_hash' => $order->hash]) }}</li>
        <li>{{ __('shop::order.confirmation.mail.customer.detail_date', ['created_at_format' => $order->created_at->format('d.m.Y')]) }}</li>
        <li>{{ __('shop::order.confirmation.mail.customer.detail_total') }} @money($order->total_pre_payment)</li>
    </ul>

    <p>{{ __('shop::order.confirmation.mail.customer.will_another_mail') }}</p>

    @if ($order->user_id)
        <p>
            {{ __('shop::order.confirmation.mail.customer.order_status') }}
        </p>
        <p style="text-align: center;">
            <a href="{{ route('account.orders.show', ['orderHash' => $order]) }}"
               class="btn">{{ __('shop::order.confirmation.mail.customer.order_status_link') }}</a>
        </p>
    @endif
</x-layouts.mail>
