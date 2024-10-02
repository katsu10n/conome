<div class="container mx-auto px-4">
    <form class="mt-4" action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea class="w-full rounded border p-2" name="content" rows="3" placeholder="コメントを入力してください"></textarea>
        <button class="mt-2 rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600" type="submit">コメントする</button>
    </form>
</div>
