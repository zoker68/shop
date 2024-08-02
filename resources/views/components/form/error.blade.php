@props([
    'name',
])

@error($name)
<div {{ $attributes->class(['text-red-400']) }}>
    {{ $message }}
</div>
@enderror
