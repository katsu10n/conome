@props(['href' => '', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' =>
                'block flex w-full items-center gap-4 py-3 transition-all' .
                ($active ? ' text-sub font-bold hover:text-sub' : ' border-transparent hover:text-subLight'),
        ]) }}>
        {{ $slot }}
    </a>
</li>
