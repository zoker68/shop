@props([
    'property',
    'filters'
])

<div class="pb-4 border-b border-[#E9E4E4] mb-4">
    <div class="justify-between items-start">
        <h4 class="flex text-xl font-medium  text-secondary uppercase mb-4">{{$property->name}}</h4>

    </div>
    <div class="space-y-3">
        <div class="custom_check justify-between items-center" x-data="{ open: false }">
            @include($property->getBladeComponentName(), ['property' => $property, 'selected' => $filters[$property->id] ?? null])
        </div>
    </div>
</div>
