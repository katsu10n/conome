<div class="mb-24 pt-4">
    <h2 class="mb-4 text-lg font-semibold">人気の投稿</h2>

    <div class="mb-6">
        <h3 class="text-md mb-2 font-semibold">直近7日間</h3>
        @foreach ($popularPosts['recent'] as $post)
            <x-posts.post-item-simple :post="$post" />
        @endforeach
    </div>

    <div>
        <h3 class="text-md mb-2 font-semibold">累計</h3>
        @foreach ($popularPosts['allTime'] as $post)
            <x-posts.post-item-simple :post="$post" />
        @endforeach
    </div>
</div>
