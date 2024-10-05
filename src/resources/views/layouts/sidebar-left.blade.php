<nav class="mb-8">
    <ul>
        <div class="border-b">
            <x-nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                <x-icons.icon-person />
                プロフィール
            </x-nav-link>
            <x-nav-link>
                <x-icons.icon-notice />
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
            <x-nav-link class="group justify-between"
                href="{{ request()->routeIs('posts.followed') || request()->routeIs('posts.category.followed')
                    ? route('posts.category.followed', $category->slug)
                    : route('posts.category', $category->slug) }}"
                :active="$isCategoryActive">
                <span>{{ $category->name }}</span>
                <form class="inline" action="{{ route('categories.favorite', $category) }}" method="POST">
                    @csrf
                    <input name="scroll_position" type="hidden" value="">
                    <button
                        class="favorite-btn ml-2 flex items-center justify-center text-gray-400 transition-colors duration-200 hover:text-amber-400"
                        type="submit" onclick="this.form.elements.scroll_position.value = window.pageYOffset;">
                        <x-icons.icon-star
                            class="{{ $category->is_favorited ? 'text-amber-400' : 'opacity-0 group-hover:opacity-100' }}"
                            :fill="$category->is_favorited" />
                    </button>
                </form>
            </x-nav-link>
        @endforeach
    </ul>
</nav>
