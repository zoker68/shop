@props(['required' => false])
<input {{ $attributes->class([
    'w-full border border-[#E9E4E4] rounded
    placeholder:text-slate-400
    focus:ring-0 focus:border-primary mt-1 text-sm
']) }} @if($required) required @endif>
