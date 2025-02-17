<x-layouts.mail>
    <x-slot:header>{{ __('shop::order.confirmation.mail.admin.header') }}</x-slot:header>

    <p class="pt-3">{{ __('shop::order.confirmation.mail.admin.text') }}</p>

    <p style="text-align: center;">
        <a href="{{ $link }}" class="btn">{{ __('shop::order.confirmation.mail.admin.link') }}</a>
    </p>
</x-layouts.mail>
