<div class="pb-10">
    <div wire:ignore>
        <select class="nice-select filters" wire:model="filters.{{ $property->id }}" id="#selectmoy">
            <option value="">No filter</option>
            @foreach($property->filterOptions as $index => $value)
                <option value="{{ $index }}" @if($index == $selected) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
