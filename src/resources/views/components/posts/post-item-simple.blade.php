<div class="mb-2 border-b">
    <p>
        <a class="user-link text-sm text-text-light hover:underline" href="{{ route('profile.show', $post->user->uid) }}">
            {{ '@' . $post->user->uid }}
        </a>
    </p>
    <p>
        <a class="hover:underline" href="{{ route('posts.show', ['uid' => $post->user->uid, 'post' => $post]) }}">
            {{ Str::limit($post->title, 30) }}
        </a>
    </p>
</div>
