<ul class="flex items-center">
    <x-posts.post-header-nav-link href="{{ route('profile.show', $user->uid) }}" :active="request()->routeIs('profile.show')">
        {{ __('投稿') }}
    </x-posts.post-header-nav-link>

    <x-posts.post-header-nav-link href="{{ route('profile.comments', $user->uid) }}" :active="request()->routeIs('profile.comments')">
        {{ __('コメント') }}
    </x-posts.post-header-nav-link>

    <x-posts.post-header-nav-link href="{{ route('profile.likes', $user->uid) }}" :active="request()->routeIs('profile.likes')">
        {{ __('いいね') }}
    </x-posts.post-header-nav-link>
</ul>
