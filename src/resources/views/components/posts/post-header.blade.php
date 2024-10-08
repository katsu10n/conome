<ul class="flex w-full">
    <x-posts.post-header-nav-link
        href="{{ request()->route('category') ? route('posts.category', request()->route('category')) : route('posts.index') }}"
        :active="!request()->routeIs('posts.followed') && !request()->routeIs('posts.category.followed')">
        {{ __('全ユーザー') }}
    </x-posts.post-header-nav-link>

    <x-posts.post-header-nav-link
        href="{{ request()->route('category') ? route('posts.category.followed', request()->route('category')) : route('posts.followed') }}"
        :active="request()->routeIs('posts.followed') || request()->routeIs('posts.category.followed')">
        {{ __('フォロー中') }}
    </x-posts.post-header-nav-link>
</ul>
