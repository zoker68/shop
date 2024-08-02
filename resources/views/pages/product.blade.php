<x-layouts.app>
    <x-partials.breadcrumbs :data="$product->getBreadcrumbs()"/>

    <livewire:product :product="$product"/>

</x-layouts.app>
