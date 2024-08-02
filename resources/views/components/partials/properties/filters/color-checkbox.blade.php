<div class="grid grid-cols-4 gap-3 items-center size_selector color_selector">
    @foreach($property->filterOptions as $index => $value)
        <div class="single_size_opt">
            <input
                type="checkbox"
                wire:model="filters.{{ $property->id }}.{{ $index }}"
                id="{{ $property->id }}-{{ $index }}"
                @if(isset($selected[$index]) && $selected[$index] == 'true') checked @endif
                class="size_inp"
            >
            <label for="{{ $property->id }}-{{ $index }}" class="w-6 h-6 bg-primary focus:ring-1  inline-block"  style="background-color: {{ $value }}"
                   data-bs-toggle="tooltip" title="" data-bs-original-title="Rose Red"
                   aria-label="Rose Red" checked=""></label>
        </div>
    @endforeach
</div>
