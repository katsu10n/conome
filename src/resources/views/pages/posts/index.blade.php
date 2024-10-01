<x-app-layout>
    <ul>
        @foreach ($posts as $post)
            <x-posts.card :post="$post" :isLink="true" />
        @endforeach
    </ul>
</x-app-layout>
