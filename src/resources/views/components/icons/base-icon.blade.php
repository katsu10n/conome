@props(['viewBox' => '0 -960 960 960', 'fill' => 'currentColor', 'class' => ''])

<svg {{ $attributes->merge(['class' => $class]) }} xmlns="http://www.w3.org/2000/svg" viewBox="{{ $viewBox }}"
    fill="{{ $fill }}">
    {{ $slot }}
</svg>
