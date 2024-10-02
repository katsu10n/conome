<nav>
    <ul>
        <div class="border-b">
            <x-nav-link :href="route('profile.show', Auth::user()->uid)">
                プロフィール
            </x-nav-link>
            <x-nav-link href="">
                通知
            </x-nav-link>
        </div>
        <x-nav-link href="{{ route('posts.index') }}" :active="!request()->route('category')">
            すべて
        </x-nav-link>
        @foreach ($categories as $category)
            <x-nav-link class="group flex w-full items-center justify-between"
                href="{{ route('posts.category', $category->id) }}" :active="request()->route('category') == $category->id">
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
