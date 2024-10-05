@props(['href' => '', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' =>
                'block flex w-full items-center gap-4 py-3 rounded-xl px-4 transition-all duration-200 ease-in-out hover:bg-slate-100' .
                ($active ? ' text-sub font-bold hover:text-sub' : ' border-transparent text-gray-600 '),
        ]) }}>
        {{ $slot }}
    </a>
</li>
