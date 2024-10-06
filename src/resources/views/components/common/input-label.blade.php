@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-text-light']) }}>
    {{ $value ?? $slot }}
</label>
