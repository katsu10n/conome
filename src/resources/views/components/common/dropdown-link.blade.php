<a
    {{ $attributes->merge([
        'class' => 'items-center gap-2 flex block w-full p-3 text-start text-sm leading-5 transition-all
                hover:text-main focus:outline-none',
    ]) }}>
    {{ $slot }}
</a>
