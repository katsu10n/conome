<header class="sticky top-0 z-20 grid grid-cols-[16rem_minmax(0,1fr)_20rem] gap-8 bg-bc" id="main-header">
    <div class="-mt-1 flex items-center justify-between">
        <h1 class="text-2xl font-bold"><a href="/">Conome</a></h1>
        <div class="">
            <x-users.user-nav-modal />
        </div>
    </div>
    <nav class="flex items-center overflow-hidden text-center">
        @if (request()->routeIs('posts.index') ||
                request()->routeIs('posts.category') ||
                request()->routeIs('posts.followed') ||
                request()->routeIs('posts.category.followed'))
            <x-posts.post-header />
        @else
            <div class="flex w-full items-center border-b border-gray-200 text-left">
                {{ $backButton ?? '' }}
            </div>
        @endif
    </nav>
    <div class="flex items-center">
        <input class="w-full rounded-full bg-bc px-4 py-2" type="text" placeholder="検索（未実装）" />
    </div>
</header>
