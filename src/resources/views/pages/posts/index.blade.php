<x-app-layout>
    <x-posts.header />
    <div class="max-h-dvh overflow-scroll rounded-lg bg-white">

        <ul>
            @foreach ($posts as $post)
                <a class="my-4 grid grid-cols-[auto,1fr] grid-rows-[auto,1fr,auto] rounded-xl border p-2 shadow-md transition-shadow duration-300 hover:bg-gray-50 hover:shadow-lg"
                    href="">
                    <div class="row-span-2 mr-2">
                        <x-icons.user class="h-6 w-6 text-gray-400" />
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <p class="font-semibold">{{ $post->user->name }}</p>
                            <p class="">{{ '@' . $post->user->uid }}</p>
                            <p class="">○時間前</p>
                        </div>
                        <div>
                            <p class="py-1">{{ $post->title }}</p>
                            <p class="py-1">{{ $post->content }}</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="col-span-2 flex justify-start gap-2">
                            <div class="flex items-center">
                                <x-icons.comment class="mr-1 h-4 w-4" />
                                <span>5</span>
                            </div>
                            <div class="flex items-center">
                                <x-icons.heart class="mr-1 h-4 w-4" />
                                <span>10</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </ul>
    </div>
</x-app-layout>
