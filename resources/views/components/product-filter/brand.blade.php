@props([
    'brand'
])

<div class="flex gap-3 items-center">
    <input type="checkbox" id="brand_{{ $brand->slug }}"
           class="focus:ring-0 text-primary focus:bg-primary focus:outline-none"
           wire:model="selectedBrands.{{ $brand->slug }}"
    >
    <label for="brand_{{ $brand->slug }}"
           class="relative cursor-pointer text-secondary">{{ $brand->name }}</label>
</div>
