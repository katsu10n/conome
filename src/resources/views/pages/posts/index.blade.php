<x-app-layout>
    <ul>
        @foreach ($posts as $post)
            <x-posts.post-item :post="$post" :isLink="true" :current-user-id="$currentUserId" />
        @endforeach
    </ul>
    @if ($posts->count() == 0)
        <p class="mt-8 text-center text-xl font-bold">投稿がありません</p>
    @endif
</x-app-layout>
