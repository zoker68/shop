@foreach($property->filterOptions as $index => $value)
    <div class="flex gap-3 items-center" @if(config('category.filters.hideVariantsMoreThan') == 0 || $loop->index < config('category.filters.hideVariantsMoreThan') || (isset($selected[$index]) && $selected[$index] == 'true')) x-show="true" checked @endif x-show="open" x-transition.duration.500ms>
    <input
            type="checkbox"
            wire:model="filters.{{ $property->id }}.{{ $index }}"
            id="{{ $property->id }}-{{ $index }}"
            @if(isset($selected[$index]) && $selected[$index] == 'true') checked @endif>
        <label for="{{ $property->id }}-{{ $index }}">{{ $value }}</label>
    </div>
@endforeach

@if(config('category.filters.hideVariantsMoreThan') > 0 && count($property->filterOptions) > config('category.filters.hideVariantsMoreThan'))
    <template x-if="open">
        <a href="#" class="text-secondary" x-on:click.prevent="open = ! open">hide</a>
    </template>
    <template x-if="!open">
        <a href="#" class="text-secondary" x-on:click.prevent="open = ! open">show more</a>
    </template>

@endif
