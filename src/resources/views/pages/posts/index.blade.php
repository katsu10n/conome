<ul class="space-y-4">
    @foreach ($categories as $post)
        <li>
            <a href="">{{ $post->name }}</a>
        </li>
    @endforeach
</ul>
<ul class="space-y-4">
    @foreach ($posts as $post)
        <li>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </li>
    @endforeach
</ul>
{{ $posts->links() }}
