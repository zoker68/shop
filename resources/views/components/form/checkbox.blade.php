@props(['required' => false])
<input {{ $attributes->class([
    'border border-[#E9E4E4] rounded
    focus:ring-0 focus:border-primary
']) }}

       type="checkbox"
       @if($required) required @endif>
