<div x-data="{ open: false }" @keydown.escape="open = false">
    <button class="flex w-full justify-center gap-1 transition hover:text-main" type="button" @click="open = !open">
        <x-icons.icon-pencil class="w-7" />
    </button>

    <x-common.modal-card title="投稿を作成" open="open">
        <x-posts.post-form />
    </x-common.modal-card>
</div>
