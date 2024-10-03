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
    <div class="relative mx-auto max-w-screen-lg" id="container">
        <header class="sticky top-0 z-20 grid grid-cols-[15rem_1fr_15rem] gap-8 bg-white" id="main-header">
            <div class="flex justify-between">
                <h1 class="py-4 text-lg font-bold"><a href="">Conome</a></h1>
                <x-user-nav-modal />
            </div>
            <nav class="text-center text-sm font-medium text-gray-500">
                @if (request()->routeIs('posts.index') ||
                        request()->routeIs('posts.category') ||
                        request()->routeIs('posts.followed') ||
                        request()->routeIs('posts.category.followed'))
                    <x-posts.post-header />
                @else
                    <ul class="-mb-px flex border-b border-gray-200">
                        <li class="flex-1">
                            <x-header-nav-back />
                        </li>
                    </ul>
                @endif
            </nav>
            <div class="flex items-center">
                <input class="rounded-full px-4 py-2" type="text" placeholder="検索（未実装）" />
            </div>
        </header>

        <div class="grid grid-cols-[15rem_1fr_15rem] gap-8">
            <div class="max-h-dvh sidebar overflow-scroll">
                @include('layouts.sidebar-left')
            </div>

            <main>
                {{ $slot }}
            </main>

            <div class="max-h-dvh sidebar overflow-scroll">
                @include('layouts.sidebar-right')
            </div>
        </div>
    </div>

    <div class="fixed bottom-4 z-50 w-52" id="modal-container">
        <x-posts.post-form-modal />
    </div>
</body>

</html>
