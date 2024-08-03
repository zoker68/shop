<x-zoker.shop::layouts.app>
    <x-zoker.shop::partials.breadcrumbs :data="$breadcrumbs" />

    <div class="w-full max-w-[800px] mx-auto px-4 py-14">
        <div class="flex justify-center">
            <img loading="lazy" src="/assets/images/complete.png" alt="success" style="filter: invert(51%) sepia(85%) saturate(4502%) hue-rotate(207deg) brightness(99%) contrast(94%);">
        </div>
        <div class="text-center mt-6">
            <h4 class="text-xl sm:text-3xl uppercase">{{ __('zoker.shop::checkout.success.title') }}</h4>
            <p class="mt-4">{{ __('zoker.shop::checkout.success.text') }}</p>
            <div class="mt-6">
                <a href="{{ route('index') }}" class="default_btn">{{ __('zoker.shop::checkout.success.button') }}</a>
            </div>
        </div>
    </div>
</x-zoker.shop::layouts.app>
