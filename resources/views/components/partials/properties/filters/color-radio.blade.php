<div class="grid grid-cols-4 gap-3 items-center size_selector color_selector">
@foreach($property->filterOptions as $index => $value)
    <div class="single_size_opt">
        <input
            type="radio"
            wire:model="filters.{{ $property->id }}"
            value="{{ $index }}"
            id="{{ $property->id }}-{{ $index }}"
            class="size_inp"
        >
        <label for="{{ $property->id }}-{{ $index }}" class="w-6 h-6 bg-primary focus:ring-1  inline-block" style="background-color: {{ $value }}"></label>
    </div>
@endforeach
</div>
