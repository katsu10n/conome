@props(['post'])

<div x-data="{ open: false }" @keydown.escape="open = false">
    <button
        class="flex w-full justify-center gap-1 rounded-full bg-text-light px-6 py-4 text-base font-bold text-bc transition ease-in hover:bg-text focus:outline-none"
        type="button" @click="open = !open">
        <span>コメントする</span>
        <x-icons.icon-comment class="relative top-[5px] w-4" />
    </button>

    <x-common.modal-card title="コメントする" open="open">
        <x-comments.comment-form :post="$post" />
    </x-common.modal-card>
</div>
