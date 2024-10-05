<nav class="mb-8">
    <ul>
        <div class="border-b">
            <x-nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                プロフィール
            </x-nav-link>
            <x-nav-link href="" :active="false">
                通知（未実装）
            </x-nav-link>
        </div>
        <x-nav-link href="{{ route('posts.index') }}" :active="!request()->routeIs('profile.*') &&
            !request()->route('category') &&
            !request()->routeIs('posts.show')">
            すべて
        </x-nav-link>
        @foreach ($categories as $category)
            @php
                $isCategoryActive =
                    !request()->routeIs('profile.*') &&
                    !request()->routeIs('posts.show') &&
                    request()->route('category') &&
                    request()->route('category')->slug === $category->slug;
            @endphp
            <x-nav-link class="group flex w-full items-center justify-between"
                href="{{ request()->routeIs('posts.followed') || request()->routeIs('posts.category.followed')
                    ? route('posts.category.followed', $category->slug)
                    : route('posts.category', $category->slug) }}"
                :active="$isCategoryActive">
                <span>{{ $category->name }}</span>
                @auth
                    <button class="favorite-btn ml-2 text-gray-400 transition-colors duration-200 hover:text-yellow-400"
                        data-category-id="{{ $category->id }}"
                        data-is-favorited="{{ $category->is_favorited ? 'true' : 'false' }}"
                        onclick="event.preventDefault(); toggleFavorite(this);">
                        <x-icons.icon-star
                            class="{{ $category->is_favorited ? 'text-yellow-400' : 'opacity-0 group-hover:opacity-100' }}"
                            :filled="$category->is_favorited" />
                    </button>
                @endauth
            </x-nav-link>
        @endforeach
    </ul>
</nav>
