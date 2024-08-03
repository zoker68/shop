<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="$product->getBreadcrumbs()"/>

    <livewire:product :product="$product"/>

</x-shop::layouts.app>
