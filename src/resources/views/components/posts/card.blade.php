@props(['post', 'isLink' => true])

@php
    $baseClasses =
        'my-4 grid grid-cols-[auto,1fr] grid-rows-[auto,1fr,auto] rounded-xl border p-2 shadow-md transition-shadow duration-300';
    $linkClasses = $isLink ? 'hover:bg-gray-50 hover:shadow-lg' : '';
@endphp

<{{ $isLink ? 'a' : 'div' }} class="{{ $baseClasses }} {{ $linkClasses }}"
    {{ $isLink ? 'href=' . route('posts.show', $post) : '' }}>
    <div class="row-span-2 mr-2">
        <x-icons.user class="h-10 w-10 text-gray-400" />
    </div>
    <div class="flex flex-col">
        <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <p class="font-semibold">{{ $post->user->name }}</p>
                <p class="text-gray-500">○時間前</p>
            </div>
            <p class="ml-auto text-green-700">{{ $post->category->name }}</p>
        </div>
        <div>
            <p class="">{{ '@' . $post->user->uid }}</p>
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
    </{{ $isLink ? 'a' : 'div' }}>
