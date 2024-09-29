@props(['href', 'active' => false])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' =>
            'block py-2 transition-all duration-200 ease-in-out
                hover: hover:text-gray-400' . ($active ? ' text-blue-600' : ' border-transparent text-gray-600'),
    ]) }}>
    {{ $slot }}
</a>
