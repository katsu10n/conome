<div>
    <ul>
        @foreach ($posts as $post)
            <x-posts.post-item :post="$post" :isLink="true" :current-user-id="$currentUserId" />
        @endforeach
    </ul>
    @if ($posts->count() == 0)
        <p class="mt-8 text-center text-xl font-bold">投稿がありません</p>
    @endif
    @if ($hasMore)
        <div class="group mt-4 text-center">
            <button
                class="transtion w-full rounded border border-text-light py-2 text-text-light duration-200 ease-out hover:border-main group-hover:text-main-dark"
                wire:click="loadMore">
                もっと見る
            </button>
        </div>
    @endif
</div>
