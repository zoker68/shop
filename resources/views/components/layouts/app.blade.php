<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ZoKeR Shop') }}</title>


    <x-zoker.shop::partials.favicon/>

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
    @vite('resources/css/app.css')

</head>
<body>
<div class="notification-container" id="notificationContainer"></div>

{{--<x-zoker.shop::partials.preloader />--}}

<x-zoker.shop::partials.header />

<x-zoker.shop::partials.navbar/>

{{--<x-zoker.shop::partials.mobile />--}}

{{ $slot }}

<x-zoker.shop::partials.footer/>

{{--<x-zoker.shop::partials.popup/>--}}

{{--<x-zoker.shop::partials.quick-view/>--}}

<!-- script -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('productView', {
            isActive: false
        })
    })

</script>
@livewireScripts
@stack('scripts')
@vite('resources/js/app.js')
</body>
</html>
