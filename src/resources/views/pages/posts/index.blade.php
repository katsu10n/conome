<x-app-layout>
    <ul>
        @foreach ($posts as $post)
            <x-posts.post-list :post="$post" :isLink="true" />
        @endforeach
    </ul>
</x-app-layout>
