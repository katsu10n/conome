@props(['active' => false])

@php
    $classes = $active ? 'border-main font-bold text-main' : 'hover:border-gray-light hover:text-main';
@endphp

<li class="flex-1 cursor-pointer">
    <a
        {{ $attributes->merge(['class' => "$classes inline-block w-full p-4 border-b-2 text-sm text-center transition"]) }}>
        {{ $slot }}
    </a>
</li>
