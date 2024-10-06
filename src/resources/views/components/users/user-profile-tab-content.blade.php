<div class="mt-6">
    <div class="space-y-4">
        @forelse($posts as $post)
            <x-posts.post-item :post="$post" :currentUserId="Auth::id()" />
        @empty
            @if (request()->routeIs('profile.show'))
                <p class="text-center text-gray-500">投稿がありません</p>
            @elseif(request()->routeIs('profile.comments'))
                <p class="text-center text-gray-500">コメントした投稿がありません</p>
            @elseif(request()->routeIs('profile.likes'))
                <p class="text-center text-gray-500">いいねした投稿がありません</p>
            @endif
        @endforelse
    </div>
</div>
