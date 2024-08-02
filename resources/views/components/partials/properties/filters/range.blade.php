<div wire:ignore>
    <span id="rangeValue-property{{ $property->id }}" class="block relative text-center text-xl font-semibold"></span>

    <div class="range-filter" id="rangeFilter-{{ $property->id }}"
             data-min="{{ $property->filterOptions['min'] }}" data-set-min="{{ $filters[$property->id]['min'] ?? $property->filterOptions['min'] }}"
             data-max="{{ $property->filterOptions['max'] }}" data-set-max="{{ $filters[$property->id]['max'] ?? $property->filterOptions['max'] }}"
             data-prop-id="{{ $property->id }}">
    </div>
</div>
