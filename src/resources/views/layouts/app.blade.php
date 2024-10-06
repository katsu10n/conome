<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link type="image/png" href="{{ asset('images/logo.png') }}" rel="icon">

    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh list-none bg-bc font-IBM text-text antialiased">
    <div class="relative mx-auto mb-16 max-w-screen-xl px-8" id="container">
        @include('layouts.header')

        <div class="grid grid-cols-[16rem_minmax(0,1fr)_20rem] gap-8">
            <div class="scrollbar-wrapper sidebar">
                <nav class="border-b">
                    <ul>
                        <x-common.nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                            <x-icons.icon-person class="w-6" />
                            プロフィール
                        </x-common.nav-link>
                        <x-common.nav-link>
                            <x-icons.icon-notice class="w-6" />
                            通知（未実装）
                        </x-common.nav-link>
                    </ul>
                </nav>
                <div class="max-h-dvh scrollbar overflow-y-auto">
                    @include('layouts.sidebar-left')
                </div>
            </div>

            <main class="min-w-0">
                {{ $slot }}
            </main>

            <div class="scrollbar-wrapper">
                <div class="max-h-dvh sidebar scrollbar overflow-y-auto">
                    @include('layouts.sidebar-right')
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-4 z-50 w-52" id="modal-container">
        <x-posts.post-form-modal />
    </div>

    @if (old('scroll_to'))
        <script>
            window.onload = function() {
                window.scrollTo(0, {{ old('scroll_to') }});
            }
        </script>
    @endif
</body>

</html>
