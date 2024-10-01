<div class="sm:ms-6 sm:flex sm:items-center" x-data="{ open: false }" @keydown.escape="open = false">
    <button
        class="w-full rounded-full bg-blue-600 px-6 py-4 text-center text-base font-semibold text-white shadow-md transition duration-200 ease-in hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
        type="button" @click="open = !open">
        投稿する
    </button>

    <div class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-labelledby="modal-title" aria-modal="true"
        style="display: none;" x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">
        <div class="flex min-h-screen items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                @click="open = false"></div>

            <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>

            <div class="inline-block w-full transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:max-w-lg sm:align-middle"
                @click.stop>
                <form class="flex w-full flex-col bg-white px-4 py-8 sm:px-6 md:px-8 lg:px-10"
                    action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="mb-2 flex flex-col">
                        <select class="rounded-lg border border-gray-300 px-4 py-2" name="category_id" required>
                            <option value="">カテゴリーを選択</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <input
                            class="w-full flex-1 appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 text-base text-gray-700 placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600"
                            id="title" name="title" type="text" placeholder="タイトル" required />
                    </div>
                    <div class="mb-6 flex flex-col">
                        <textarea
                            class="w-full flex-1 appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 text-base text-gray-700 placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600"
                            id="content" name="content" placeholder="内容" rows="4" required></textarea>
                    </div>
                    <div class="flex w-full">
                        <button
                            class="w-full rounded-lg bg-purple-600 px-4 py-2 text-center text-base font-semibold text-white shadow-md transition duration-200 ease-in hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                            type="submit">
                            投稿する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
