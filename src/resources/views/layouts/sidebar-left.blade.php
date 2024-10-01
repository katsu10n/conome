<nav>
    <ul>
        <div class="border-b">
            <x-nav-link href="">
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
            <x-nav-link href="{{ route('posts.category', $category->id) }}" :active="request()->route('category') == $category->id">
                {{ $category->name }}
            </x-nav-link>
        @endforeach
    </ul>
</nav>
