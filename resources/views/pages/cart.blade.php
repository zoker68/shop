<x-layouts.app>
    <x-partials.breadcrumbs :data="[['title' => __('cart.breadcrumbs'), 'url' => route('cart')]]"/>

    <livewire:cart/>
</x-layouts.app>
