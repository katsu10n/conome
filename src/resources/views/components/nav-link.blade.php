@props(['href', 'active' => false])

@php
    $classes = $active ?? false ? 'bg-slate-100' : 'hover:bg-slate-100';
@endphp

<a href="{{ $href }}"
    {{ $attributes->merge([
            'class' => 'w-full py-4 inline-block ' . $classes,
        ])->class([
            'bg-slate-100' => $active,
        ]) }}>
    {{ $slot }}
</a>
