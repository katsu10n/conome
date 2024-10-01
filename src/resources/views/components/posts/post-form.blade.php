<form class="flex w-full flex-col bg-white px-4 py-8 sm:px-6 md:px-8 lg:px-10" action="{{ route('posts.store') }}"
    method="POST">
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
