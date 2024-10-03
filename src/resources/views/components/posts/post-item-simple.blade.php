<div class="mb-2 border-b">
    <p>
        <a class="user-link hover:underline" href="{{ route('profile.show', $post->user->uid) }}">
            {{ '@' . $post->user->uid }}
        </a>
    </p>
    <p>
        <a class="text-blue-600 hover:underline" href="{{ route('posts.show', $post) }}">
            {{ Str::limit($post->title, 30) }}
        </a>
    </p>
</div>
