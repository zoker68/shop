@props([
    'required' => false,
    'options' => [],
    'placeholder' => null,
    'selected' => null,
])
<select {{ $attributes->class([
    'w-full border border-[#E9E4E4] rounded
    placeholder:text-slate-400
    focus:ring-0 focus:border-primary mt-1
']) }} @if($required) required @endif>
@if($placeholder)
    <option value="">{{ $placeholder }}</option>
@endif
@foreach($options as $key => $value)
    <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}</option>
@endforeach
</select>
