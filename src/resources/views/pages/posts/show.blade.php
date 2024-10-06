<x-app-layout>
    <x-slot name="backButton">
        <x-common.button-back :main="$post->title" :sub="$post->created_at->format('Y年n月j日 H:i')" />
    </x-slot>

    <div class="rounded-lg bg-white">
        <x-posts.post-item :post="$post" :isLink="false" :current-user-id="$currentUserId" />
        <x-comments.comment-form :post="$post" />
        <x-comments.comment-list :comments="$post->comments" />
    </div>
</x-app-layout>
