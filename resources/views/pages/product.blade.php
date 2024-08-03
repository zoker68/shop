<x-zoker.shop::layouts.app>
    <x-zoker.shop::partials.breadcrumbs :data="$product->getBreadcrumbs()"/>

    <livewire:product :product="$product"/>

</x-zoker.shop::layouts.app>
