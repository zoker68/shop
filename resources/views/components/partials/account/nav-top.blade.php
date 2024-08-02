@props([
    'active' => false,
])
<a {{ $attributes }}
   class="flex gap-2 items-center text-lg lg:text-base xl:text-lg font-medium group @if($active) text-primary hover:text-secondary @else hover:text-primary @endif">
    {{ $slot }}
</a>
