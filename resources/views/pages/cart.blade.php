<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="[['title' => __('shop::cart.breadcrumbs'), 'url' => route('cart')]]"/>

    <livewire:shop.cart/>
</x-shop::layouts.app>
