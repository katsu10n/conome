<x-app-layout>
    <div class="rounded-lg bg-white">
        <x-posts.post-list :post="$post" :isLink="false" :current-user-id="$currentUserId" />
        <x-comments.comment-form :post="$post" />
        <x-comments.comment-list :comments="$post->comments" />
    </div>
</x-app-layout>
