<x-common.dropdown align="right" width="w-60">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center gap-4 transition duration-150 ease-in-out hover:text-main focus:outline-none">
            <x-icons.icon-arrow-dropdown class="w-6" />
        </button>
    </x-slot>

    <x-slot name="content">
        @if ($comment->user_id === Auth::id())
            <x-common.dropdown-link>
                <form class="flex w-full items-center text-red-600 hover:text-red-800"
                    action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="flex w-full items-center" type="submit">
                        <x-icons.icon-trash class="w-6" />
                        <span class="ml-2">コメントを削除する</span>
                    </button>
                </form>
            </x-common.dropdown-link>
        @endif

        @if ($comment->user_id !== Auth::id())
            <x-common.dropdown-link>
                <x-icons.icon-other class="w-6" />
                {{ __('＠ さんをフォローする（未）') }}
            </x-common.dropdown-link>
        @endif

    </x-slot>
</x-common.dropdown>
