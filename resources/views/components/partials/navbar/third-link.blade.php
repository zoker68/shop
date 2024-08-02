@props([
    'category'
])

<a href="{{ route('category', $category) }}"
        {{ $attributes->class(['block text-[15px] text-[#453E3E] mb-[9px] hover:text-primary transition duration-300']) }}>{{ $category->name }}</a>
