<x-app-layout>
    <ul>
        @foreach ($posts as $post)
            <x-posts.post-item :post="$post" :isLink="true" :current-user-id="$currentUserId" />
        @endforeach
    </ul>
</x-app-layout>
