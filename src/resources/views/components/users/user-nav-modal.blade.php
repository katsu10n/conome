<!-- Settings Dropdown -->
<div class="hidden sm:ms-6 sm:flex sm:items-center">
    <x-dropdown align="right" width="w-56">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center gap-2 text-sm transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                <x-icons.icon-user class="h-6 w-6" />
                <p>{{ Auth::user()->name ?? 'ゲスト' }}</p>

                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('アカウント設定') }}
            </x-dropdown-link>

            <x-dropdown-link href="">
                {{ __('利用規約（未）') }}
            </x-dropdown-link>

            <x-dropdown-link href="">
                {{ __('プライバシーポリシー（未）') }}
            </x-dropdown-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
