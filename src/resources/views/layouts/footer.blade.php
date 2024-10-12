<footer class="z-20 grid bg-bc px-4 text-text-light">
    <div class="-mt-1 flex items-center justify-between">
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-common.nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <x-icons.icon-logout class="w-8" />
                </x-common.nav-link>
            </form>
        </div>
        <div>
            <x-common.nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <x-icons.icon-setting class="w-8" />
            </x-common.nav-link>
        </div>
        <div>
            <x-common.nav-link :href="route('profile.show', Auth::user()->uid)" :active="request()->routeIs('profile.*') && request()->route('uid') == Auth::user()->uid">
                <x-icons.icon-person class="w-8" />
            </x-common.nav-link>
        </div>
        <div>
            <x-common.nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                <x-icons.icon-home class="w-8" />
            </x-common.nav-link>
        </div>
    </div>

</footer>
