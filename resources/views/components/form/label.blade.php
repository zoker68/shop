@props([
    'required' => false,
])
<label {{ $attributes->merge(['class' => 'block']) }}>{{ $slot }} @if($required)<span class="text-primary">*</span>@endif</label>
