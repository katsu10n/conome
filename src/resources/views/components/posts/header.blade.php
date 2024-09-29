<header class="sticky top-0 border bg-white">
    <nav class="grid grid-flow-col">
        <x-nav-link class="text-center" :href="route('posts.index')">
            {{ __('全ユーザー') }}
        </x-nav-link>
        <x-nav-link class="text-center" :href="route('posts.index')">
            {{ __('フォロー中') }}
        </x-nav-link>
    </nav>
</header>
