<header
    class="sticky top-0 z-20 grid bg-bc md:grid-cols-[15rem_minmax(0,1fr)] md:gap-8 lg:grid-cols-[15rem_minmax(0,1fr)_16rem] xl:grid-cols-[15rem_minmax(0,1fr)_20rem]"
    id="main-header">
    <div class="-mt-1 hidden items-center md:flex">
        <h1 class="pt-1 text-2xl font-bold"><a href="/"><img class="h-auto w-12" src="{{ asset('images/logo.png') }}"
                    alt="Logo"></a></h1>
        <div class="ml-auto flex items-center gap-4">
            <x-users.user-nav-dropdown />
            <x-posts.post-form-modal-icon />
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
    <div class="hidden items-center lg:flex">
        <input
            class="w-full rounded-full bg-bc px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
            type="text" placeholder="検索（未実装）" />
    </div>
</header>
