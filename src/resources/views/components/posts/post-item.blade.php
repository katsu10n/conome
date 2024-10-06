@props(['post', 'isLink' => true, 'currentUserId'])

@php
    $baseClasses =
        'gap-2 my-4 p-3 pb-2 grid grid-cols-[auto,1fr] grid-rows-[auto,1fr] rounded-xl border shadow-md transition-shadow duration-200';
    $linkClasses = $isLink ? 'hover:bg-gray-50 hover:shadow-lg cursor-pointer' : '';
@endphp

<div class="{{ $baseClasses }} {{ $linkClasses }} post-container"
    data-post-url="{{ $isLink ? route('posts.show', ['uid' => $post->user->uid, 'post' => $post]) : '' }}">
    <a class="user-link row-span-2 block truncate font-bold hover:underline"
        href="{{ route('profile.show', $post->user->uid) }}">
        <x-icons.icon-user class="w-10 text-gray-400" />
    </a>
    <div class="flex min-w-0 flex-col">
        <div class="flex items-center justify-between gap-2">
            <div class="flex min-w-0 flex-1 items-center gap-2">
                <a class="user-link truncate font-bold hover:underline"
                    href="{{ route('profile.show', $post->user->uid) }}">
                    {{ $post->user->name }}
                </a>
            </div>
            <div class="relative ml-auto inline-block whitespace-nowrap">
                <div class="absolute inset-0 flex text-text-light">
                    <svg height="100%" viewBox="0 0 50 100">
                        <path
                            d="M49.9,0a17.1,17.1,0,0,0-12,5L5,37.9A17,17,0,0,0,5,62L37.9,94.9a17.1,17.1,0,0,0,12,5ZM25.4,59.4a9.5,9.5,0,1,1,9.5-9.5A9.5,9.5,0,0,1,25.4,59.4Z"
                            fill="currentColor" />
                    </svg>
                    <div class="-ml-px h-full flex-grow rounded-md rounded-l-none bg-text-light"></div>
                </div>
                <span class="relative pr-px font-bold uppercase text-bc">
                    <span>&emsp;{{ $post->category->name }}&nbsp;</span>
                </span>
            </div>
        </div>
        <div class="min-w-0">
            <a class="user-link text-textLight" href="{{ route('profile.show', $post->user->uid) }}">
                {{ '@' . $post->user->uid }}
            </a>
            <p class="border-b py-1">{{ $post->title }}</p>
            <p class="pt-1">{{ $post->content }}</p>
        </div>
    </div>
    <div class="flex items-end justify-between pt-1">
        <div
            class="{{ $post->comments->contains('user_id', Auth::id()) ? 'text-green-600' : ' ' }} mr-8 flex items-center gap-2 transition">
            <x-icons.icon-comment class="w-5" />
            <span>{{ $post->comments->count() }}</span>
        </div>
        <div class="mr-8 flex items-center">
            <button
                class="like-button {{ $post->likes->contains('user_id', Auth::id()) ? 'text-red-500 hover:opacity-70' : ' hover:text-red-500' }} mr-2 flex items-center transition"
                data-post-id="{{ $post->id }}"
                data-liked="{{ $post->likes->contains('user_id', Auth::id()) ? 'true' : 'false' }}" type="button">
                <x-icons.icon-heart
                    class="{{ $post->likes->contains('user_id', Auth::id()) ? 'fill-current' : '' }} w-6" />
                <span class="like-count ml-2 text-sm"
                    data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</span>
            </button>
        </div>
        <div class="post-dropdown -mb-[5px]">
            <x-posts.post-nav-dropdown :post="$post" :current-user-id="$currentUserId" />
        </div>

        <p class="text-textLight text-sm">
            {{ $post->created_at->format(!$isLink ? 'Y年n月j日 H:i' : 'n月j日 H:i') }}</p>
    </div>
</div>
