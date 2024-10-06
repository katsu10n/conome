<x-app-layout>
    <x-slot name="backButton">
        <x-common.button-back :main="$post->title" :sub="$post->created_at->format('Y年n月j日 H:i')" />
    </x-slot>

    <div class="grid gap-4">
        <div>
            <x-posts.post-item :post="$post" :isLink="false" :current-user-id="$currentUserId" />
        </div>

        <div>
            {{-- <x-comments.comment-form-modal :post="$post" /> --}}
            <x-comments.comment-form :post="$post" />
        </div>

        <div>
            <x-comments.comment-item :comments="$post->comments" />
        </div>
    </div>
</x-app-layout>
