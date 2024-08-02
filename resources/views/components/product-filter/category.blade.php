@props([
    'child'
])

<div class="custom_check flex justify-between items-center">
    <div class="flex gap-3 items-center">
        <a href="{{ route('category', $child) }}" class="hover:text-primary duration-300">{{ $child->name }}</a>
    </div>
</div>
