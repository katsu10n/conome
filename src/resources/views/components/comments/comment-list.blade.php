@props(['comments'])

<br>
@foreach ($comments as $comment)
    <div class="comment mb-4 rounded bg-gray-100 p-4">
        <p class="mb-2">{{ $comment->content }}</p>
        <p class="text-sm text-gray-600">投稿者: {{ $comment->user->name }}</p>
        <p class="text-sm text-gray-600">投稿日時: {{ $comment->created_at->format('Y-m-d H:i') }}</p>

        @if (Auth::id() === $comment->user_id)
            <form class="inline" action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700" type="submit">削除</button>
            </form>
        @endif
    </div>
@endforeach
