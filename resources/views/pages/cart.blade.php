<x-zoker.shop::layouts.app>
    <x-zoker.shop::partials.breadcrumbs :data="[['title' => __('zoker.shop::cart.breadcrumbs'), 'url' => route('cart')]]"/>

    <livewire:cart/>
</x-zoker.shop::layouts.app>
