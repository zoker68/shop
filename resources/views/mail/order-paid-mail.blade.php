<x-layouts.mail>
    <x-slot:header>{{ __('shop::checkout.payment.success.mail.header') }}</x-slot:header>

    <p class="pt-3">{{ __('shop::checkout.payment.success.mail.hello', ['name' => $order->user_data['name'], 'surname' => $order->user_data['surname']]) }},</p>

    <p class="pt-3">{{ __('shop::checkout.payment.success.mail.text') }}</p>
</x-layouts.mail>
