<x-app-layout>
    <div class="rounded-lg bg-white">
        <ul>
            @foreach ($posts as $post)
                <x-posts.card :post="$post" :isLink="true" />
            @endforeach
        </ul>
    </div>
</x-app-layout>
