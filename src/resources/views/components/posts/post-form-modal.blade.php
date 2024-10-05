<div x-data="{ open: false }" @keydown.escape="open = false">
    <button
        class="w-full rounded-full bg-blue-600 px-6 py-4 text-center text-base font-semibold text-white shadow-md transition duration-200 ease-in hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
        type="button" @click="open = !open">
        投稿する
    </button>

    <x-common.modal-card open="open">
        <x-posts.post-form />
    </x-common.modal-card>
</div>
