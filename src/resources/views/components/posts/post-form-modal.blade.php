<div x-data="{ open: false }" @keydown.escape="open = false">
    <button
        class="flex w-full justify-center gap-1 rounded-full bg-main-light px-6 py-4 text-center text-base font-semibold text-bc transition duration-200 ease-in hover:bg-main focus:outline-none focus:ring-2 focus:ring-main-dark focus:ring-offset-2 focus:ring-offset-blue-200"
        type="button" @click="open = !open">
        <span>投稿する</span>
        <x-icons.icon-pencil class="relative top-[4px] h-4 w-4" />
    </button>

    <x-common.modal-card title="投稿を作成" open="open">
        <x-posts.post-form />
    </x-common.modal-card>
</div>
