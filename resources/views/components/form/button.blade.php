@props(['type' => 'submit'])
<button type="{{ $type }}" {{ $attributes->class(['default_btn rounded']) }}>{{ $slot }}</button>
