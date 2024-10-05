@props(['active' => false])

@php
    $classes = $active
        ? 'border-main text-main font-bold'
        : 'border-gray-200 hover:border-gray-100 hover:text-mainLight';
@endphp

<a {{ $attributes->merge(['class' => "$classes inline-block w-full p-4 border-b-2 text-center transition-all"]) }}>
    {{ $slot }}
</a>
