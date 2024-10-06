<nav class="mb-8">
    <ul>
        <div class="border-b">
            <x-common.nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                <x-icons.icon-person />
                プロフィール
            </x-common.nav-link>
            <x-common.nav-link>
                <x-icons.icon-notice />
                通知（未実装）
            </x-common.nav-link>
        </div>
        <x-common.nav-link href="{{ route('posts.index') }}" :active="!request()->routeIs('profile.*') &&
            !request()->route('category') &&
            !request()->routeIs('posts.show')">
            すべて
        </x-common.nav-link>
        @foreach ($categories as $category)
            @php
                $isCategoryActive =
                    !request()->routeIs('profile.*') &&
                    !request()->routeIs('posts.show') &&
                    request()->route('category') &&
                    request()->route('category')->slug === $category->slug;
            @endphp
            <x-common.nav-link class="group justify-between"
                href="{{ request()->routeIs('posts.followed') || request()->routeIs('posts.category.followed')
                    ? route('posts.category.followed', $category->slug)
                    : route('posts.category', $category->slug) }}"
                :active="$isCategoryActive">
                <span>{{ $category->name }}</span>
                <form class="inline" action="{{ route('categories.favorite', $category) }}" method="POST">
                    @csrf
                    <button
                        class="favorite-btn ml-2 flex items-center justify-center text-gray-dark transition-all hover:text-main"
                        type="submit" onclick="this.form.elements.scroll_position.value = window.pageYOffset;">
                        <x-icons.icon-star
                            class="{{ $category->is_favorited ? 'text-main-light hover:opacity-70' : 'opacity-0 group-hover:opacity-100' }} transition-all"
                            :fill="$category->is_favorited" />
                    </button>
                    <input name="scroll_position" type="hidden" value="">
                </form>
            </x-common.nav-link>
        @endforeach
    </ul>
</nav>
