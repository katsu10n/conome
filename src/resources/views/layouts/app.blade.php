<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-white font-sans antialiased">
    {{-- @include('layouts.navigation') --}}

    @include('layouts.header')

    <div class="mx-auto grid max-w-screen-lg grid-cols-[15rem_1fr_15rem] gap-4">
        <x-sidebar :items="$categories" />

        <main class="">
            {{ $slot }}
        </main>

        <x-sidebar :items="$categories" />
    </div>
</body>

</html>
