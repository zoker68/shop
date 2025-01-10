<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(empty(app('view')->yieldPushContent('meta')))
        <x-shop::partials.meta/>
    @else
        @stack('meta')
    @endif

    <x-shop::partials.favicon/>

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
    @vite('resources/css/app.css')

</head>
<body>
<div class="notification-container" id="notificationContainer"></div>

{{--<x-shop::partials.preloader />--}}

<x-shop::partials.header />

<x-shop::partials.navbar/>

<x-shop::partials.mobile />

{{ $slot }}

<x-shop::partials.footer/>

{{--<x-shop::partials.popup/>--}}

{{--<x-shop::partials.quick-view/>--}}

<!-- script -->
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
