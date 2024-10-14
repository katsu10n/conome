<div x-data="{ open: false, deleteConfirmOpen: false }" @keydown.escape="open = false; deleteConfirmOpen = false">
    <x-common.dropdown align="right" width="w-60">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center gap-4 transition duration-150 ease-in-out hover:text-main focus:outline-none">
                <x-icons.icon-arrow-dropdown class="w-6" />
            </button>
        </x-slot>

        <x-slot name="content">
            @if ($post->user_id === $currentUserId)
                <x-common.dropdown-link>
                    <button class="flex w-full items-center text-red-600 hover:text-red-800"
                        @click="deleteConfirmOpen = true">
                        <x-icons.icon-trash class="w-6" />
                        <span class="ml-2">投稿を削除する</span>
                    </button>
                </x-common.dropdown-link>
            @endif

            @if ($post->user_id !== $currentUserId)
                <x-common.dropdown-link>
                    <x-icons.icon-other class="w-6" />
                    {{ __('＠ さんをフォローする（未）') }}
                </x-common.dropdown-link>
            @endif
        </x-slot>
    </x-common.dropdown>

    <x-common.modal-card-confirm open="deleteConfirmOpen" :action="route('posts.destroy', $post)" method="DELETE" confirmText="削除する">
        本当にこの投稿を削除しますか？この操作は取り消せません。
    </x-common.modal-card-confirm>
</div>
