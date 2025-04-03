@props(['type' => 'submit'])
<button type="{{ $type }}" {{ $attributes->class(['btn btn-addtocart']) }}>{{ $slot }}</button>
