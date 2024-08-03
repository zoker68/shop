<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="$product->getBreadcrumbs()"/>

    <livewire:shop.product :product="$product"/>

</x-shop::layouts.app>
