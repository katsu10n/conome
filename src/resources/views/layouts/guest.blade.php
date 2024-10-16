<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Conome') }} -「好き」を共有するSNS</title>
    <link type="image/png" href="{{ asset('images/logo.png') }}" rel="icon">

    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-IBM text-text antialiased">
    <div
        class="flex min-h-screen flex-col place-content-center items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div class="loading">
            <div></div>
        </div>

        <div class="max-w-72 mt-6 w-full overflow-hidden rounded-lg bg-white px-6 py-4 shadow-md">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
