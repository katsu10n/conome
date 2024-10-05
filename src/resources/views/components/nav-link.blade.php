@props(['href' => '', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' =>
                'block py-2 transition-all duration-200 ease-in-out hover: hover:text-gray-400 flex gap-4' .
                ($active ? ' text-main hover:text-main' : ' border-transparent text-gray-600 '),
        ]) }}>
        {{ $slot }}
    </a>
</li>
