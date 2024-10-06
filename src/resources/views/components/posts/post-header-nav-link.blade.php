@props(['active' => false])

@php
    $classes = $active ? 'border-main font-bold' : 'border-slate-200 hover:border-gray-light hover:text-main-light';
@endphp

<a {{ $attributes->merge(['class' => "$classes inline-block w-full p-4 border-b-2 text-sm transition-all"]) }}>
    {{ $slot }}
</a>
