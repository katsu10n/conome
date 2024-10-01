<x-app-layout>
    <div class="rounded-lg bg-white">
        <x-posts.post-list :post="$post" :isLink="false" :current-user-id="$currentUserId" />
    </div>
</x-app-layout>
