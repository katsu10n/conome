<footer class="z-20 grid bg-bc px-4">
    <div class="-mt-1 flex items-center justify-between">
        <div class="pl-6">
            <x-common.nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                <x-icons.icon-home class="-mr-2 w-8" />
                ホーム
            </x-common.nav-link>
        </div>
        <div class="pr-6">
            <x-common.nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                <x-icons.icon-person class="-mr-4 w-8" />
                プロフィール
            </x-common.nav-link>
        </div>
    </div>

</footer>
