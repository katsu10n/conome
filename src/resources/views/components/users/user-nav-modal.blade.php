<div class="hidden sm:flex sm:items-center">
    <x-common.dropdown align="right" width="w-48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center gap-2 text-sm transition duration-150 ease-in-out hover:text-textLight focus:outline-none">

                <x-icons.icon-user class="h-6 w-6" />
                <p class="max-w-36 truncate">{{ Auth::user()->name ?? 'ゲスト' }}</p>

                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
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
