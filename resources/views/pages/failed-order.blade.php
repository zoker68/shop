<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="$breadcrumbs" />

    <div class="w-full max-w-[800px] mx-auto px-4 py-14">
        <div class="text-center mt-6">
            <h4 class="text-xl sm:text-3xl uppercase">{{ __('shop::checkout.failed.title') }}</h4>
            <p class="mt-4">{{ __('shop::checkout.failed.text') }}</p>
            <div class="mt-6">
                <a href="{{ route('checkout.repeatPayment', $order) }}" class="default_btn">{{ __('shop::checkout.failed.button') }}</a>
            </div>
        </div>
    </div>
</x-shop::layouts.app>
