<nav class="mb-8">
    <ul>
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
                        class="favorite-btn easein ml-2 flex items-center justify-center text-gray-dark transition ease-in hover:text-main"
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
