<form class="grid w-full grid-cols-[1fr] gap-2" action="{{ route('comments.store', $post) }}" method="POST">
    @csrf
    <textarea
        class="@error('content') border-red-500 @enderror w-full flex-1 resize-none appearance-none rounded-lg border border-gray px-4 py-2 placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-text-light"
        id="content" name="content" placeholder="内容" rows="4" required>{{ old('content') }}</textarea>

    @error('content')
        <div class="text-sm font-bold text-red-500">
            {{ $message }}
        </div>
    @enderror

    <button
        class="flex w-full justify-center gap-1 rounded-lg bg-text-light px-4 py-2 font-bold text-bc shadow-md transition ease-in hover:bg-text"
        type="submit">
        <span>コメントする</span>
        <x-icons.icon-comment class="relative top-[3px] w-5" />
    </button>
</form>
