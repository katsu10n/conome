<div class="hidden sm:flex sm:items-center">
    <x-common.dropdown align="right" width="w-48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center gap-2 text-sm transition duration-150 ease-in-out hover:text-main focus:outline-none">

                <x-icons.icon-user />
                <p class="max-w-36 truncate">{{ Auth::user()->name ?? 'ゲスト' }}</p>

                <x-icons.icon-arrow-down class="h-5 w-5" />
            </button>
        </x-slot>

        <x-slot name="content">
            <x-common.dropdown-link :href="route('profile.edit')">
                <x-icons.icon-setting />
                {{ __('設定') }}
            </x-common.dropdown-link>

            <x-common.dropdown-link>
                <x-icons.icon-other />
                {{ __('ガイドとヘルプ（未）') }}
            </x-common.dropdown-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-common.dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <x-icons.icon-logout />
                    {{ __('ログアウト') }}
                </x-common.dropdown-link>
            </form>
        </x-slot>
    </x-common.dropdown>
</div>
