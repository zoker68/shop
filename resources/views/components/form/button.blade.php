@props(['type' => 'submit'])
<button type="{{ $type }}" {{ $attributes->class(['btn btn-primary-black']) }}>{{ $slot }}</button>
