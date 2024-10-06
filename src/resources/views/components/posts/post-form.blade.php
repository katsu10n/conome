<form class="grid w-full grid-cols-[1fr] gap-2" action="{{ route('posts.store') }}" method="POST">
    @csrf

    <select
        class="w-full rounded-lg border border-gray px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
        name="category_id" required>
        <option value="">カテゴリーを選択</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input
        class="w-full flex-1 appearance-none rounded-lg border border-gray px-4 py-2 text-base placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
        id="title" name="title" type="text" placeholder="タイトル" required />
    <textarea
        class="w-full flex-1 resize-none appearance-none rounded-lg border border-gray px-4 py-2 text-base placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
        id="content" name="content" placeholder="内容" rows="4" required>
    </textarea>
    <button
        class="flex w-full justify-center gap-1 rounded-lg bg-main-light px-4 py-2 text-center text-base font-bold text-bc shadow-md transition duration-200 ease-in hover:bg-main"
        type="submit">
        <span>投稿する</span>
        <x-icons.icon-post-add class="relative top-[3px] w-5" />
    </button>
</form>
