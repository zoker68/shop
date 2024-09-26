@php
    $slide = last($slides);
@endphp

@if ($slide)
<div {{ $attributes->class(['container pb-14']) }}>
    <div class="container">
        <a href="{{ $slide['link'] }}" target="{{ $slide['target'] }}">
            <picture>
                <img class="w-full flex-shrink-0" src="{{ asset('storage/'.$slide['image']) }}" alt="{{ $slide['heading'] }}">
            </picture>
        </a>
    </div>
</div>
@endif
