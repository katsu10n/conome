@props(['href' => '', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' =>
                'block flex w-full items-center gap-4 py-3 transition-all' .
                ($active ? ' text-main font-bold hover:text-main' : ' hover:text-main'),
        ]) }}>
        {{ $slot }}
    </a>
</li>
