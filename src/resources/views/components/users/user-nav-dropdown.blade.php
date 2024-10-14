<div class="-mb-2 flex items-center" x-data="{ open: false, logoutConfirmOpen: false }" @keydown.escape="open = false; logoutConfirmOpen = false">
    <x-common.dropdown align="right" width="w-48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center gap-4 transition duration-150 ease-in-out hover:text-main focus:outline-none">
                <x-icons.icon-user class="w-8" />
                {{-- <p class="max-w-36 truncate">{{ Auth::user()->name ?? 'ゲスト' }}</p>
                <x-icons.icon-arrow-down class="h-5 w-5" /> --}}
            </button>
        </x-slot>

        <x-slot name="content">
            <x-common.dropdown-link :href="route('profile.edit')">
                <x-icons.icon-setting class="w-6" />
                {{ __('設定') }}
            </x-common.dropdown-link>

            <x-common.dropdown-link>
                <x-icons.icon-other class="w-6" />
                {{ __('ガイドとヘルプ（未）') }}
            </x-common.dropdown-link>

            <x-common.dropdown-link>
                <button class="flex w-full items-center" @click="logoutConfirmOpen = true">
                    <x-icons.icon-logout class="w-6" />
                    <span class="ml-2">{{ __('ログアウト') }}</span>
                </button>
            </x-common.dropdown-link>
        </x-slot>
    </x-common.dropdown>

    <x-common.modal-card-confirm open="logoutConfirmOpen" :action="route('logout')" method="POST" confirmText="ログアウト">
        本当にログアウトしますか？
    </x-common.modal-card-confirm>
</div>
