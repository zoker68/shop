@props([
    'route'
])
<a href="{{ route($route) }}" {{ $attributes }} class="pl-7 pt-1 block hover:text-secondary @if(request()->routeIs($route)) text-primary hover:text-secondary @endif">{{ $slot }}</a>
