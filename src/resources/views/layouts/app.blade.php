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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-dvh list-none bg-bc font-IBM text-text antialiased">
    <div class="loading">
        <div></div>
    </div>

    <x-common.flash-message />

    <div class="relative mx-auto max-w-screen-xl px-4 sm:px-6 md:mb-16 md:px-8" id="container">
        @include('layouts.header')

        <div
            class="grid grid-cols-1 md:grid-cols-[15rem_minmax(0,1fr)] md:gap-8 lg:grid-cols-[15rem_minmax(0,1fr)_16rem] xl:grid-cols-[15rem_minmax(0,1fr)_20rem]">
            <div class="scrollbar-wrapper sidebar mt-2 hidden md:block">
                <nav class="border-b">
                    <ul>
                        <x-common.nav-link href="{{ route('posts.index') }}" :active="!request()->routeIs('profile.*') &&
                            !request()->route('category') &&
                            !request()->routeIs('posts.show')">
                            <x-icons.icon-home class="w-6" />
                            ホーム
                        </x-common.nav-link>
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
                <div class="max-h-dvh scrollbar overflow-y-auto pb-40">
                    @include('layouts.sidebar-left')
                </div>
            </div>

            <main class="min-h-dvh min-w-0">
                {{ $slot }}
            </main>

            <div class="scrollbar-wrapper hidden lg:block">
                <div class="max-h-dvh sidebar scrollbar overflow-y-auto">
                    @include('layouts.sidebar-right')
                </div>
            </div>
        </div>
    </div>

    <div class="sticky bottom-0 md:hidden">
        @include('layouts.footer')
    </div>

    <div class="fixed bottom-16 right-2 z-50 md:bottom-4 md:right-4 md:w-40 lg:w-64 xl:w-80" id="modal-container">
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
