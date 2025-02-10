@props([
    'child',
    'is_active' => false
])

<div class="custom_check flex justify-between items-center pl-6">
    <div class="flex gap-3 items-center">
        <a href="{{ route('category', $child) }}" class="hover:text-primary duration-300 @if($is_active) text-primary @endif">{{ $child->name }}</a>
    </div>
</div>
