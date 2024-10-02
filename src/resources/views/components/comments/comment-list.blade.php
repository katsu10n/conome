@props(['comments'])

<br>
@foreach ($comments as $comment)
    <div class="comment mb-4 rounded bg-gray-100 p-4">
        <p class="mb-2">{{ $comment->content }}</p>
        <p class="text-sm text-gray-600">投稿者: {{ $comment->user->name }}</p>
        <p class="text-sm text-gray-600">投稿日時: {{ $comment->created_at->format('Y-m-d H:i') }}</p>
    </div>
@endforeach
