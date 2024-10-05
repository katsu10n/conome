@props(['viewBox' => '0 -960 960 960', 'fill' => 'currentColor'])

<svg {{ $attributes->merge(['class' => 'w-6']) }} xmlns="http://www.w3.org/2000/svg" viewBox="{{ $viewBox }}"
    fill="{{ $fill }}">
    {{ $slot }}
</svg>
