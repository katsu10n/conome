@props(['post', 'isLink' => true, 'currentUserId'])

@php
    $baseClasses =
        'my-4 grid grid-cols-[auto,1fr] grid-rows-[auto,1fr,auto] rounded-xl border p-2 shadow-md transition-shadow duration-300';
    $linkClasses = $isLink ? 'hover:bg-gray-50 hover:shadow-lg cursor-pointer' : '';
@endphp

<div class="{{ $baseClasses }} {{ $linkClasses }} post-container"
    data-post-url="{{ $isLink ? route('posts.show', ['uid' => $post->user->uid, 'post' => $post]) : '' }}">
    <div class="row-span-2 mr-2">
        <x-icons.icon-user class="h-10 w-10 text-gray-400" />
    </div>
    <div class="flex min-w-0 flex-col">
        <div class="flex items-center justify-between gap-2">
            <div class="flex min-w-0 flex-1 items-center gap-2">
                <a class="user-link truncate font-semibold hover:underline"
                    href="{{ route('profile.show', $post->user->uid) }}">
                    {{ $post->user->name }}
                </a>
            </div>
            <p class="ml-auto whitespace-nowrap text-green-700">{{ $post->category->name }}</p>
        </div>
        <div class="min-w-0">
            <a class="user-link hover:underline" href="{{ route('profile.show', $post->user->uid) }}">
                {{ '@' . $post->user->uid }}
            </a>
            <p class="border-b py-1">{{ $post->title }}</p>
            <p class="py-1">{{ $post->content }}</p>
        </div>
    </div>
    <div class="mt-2">
        <div class="col-span-2 flex justify-between gap-2">
            <div class="mr-8 flex items-center">
                <x-icons.icon-comment class="mr-1 h-4 w-4" />
                <span>{{ $post->comments->count() }}</span>
            </div>
            <div class="mr-8 flex items-center">
                <button
                    class="like-button {{ $post->isLikedBy(Auth::user()) ? 'text-red-500 hover:text-red-600' : 'text-gray-400 hover:text-red-500' }} mr-2 flex items-center"
                    data-post-id="{{ $post->id }}"
                    data-liked="{{ $post->isLikedBy(Auth::user()) ? 'true' : 'false' }}" type="button">
                    <x-icons.icon-heart class="{{ $post->isLikedBy(Auth::user()) ? 'fill-current' : '' }} h-6 w-6" />
                </button>
                <span class="like-count text-sm" data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</span>
            </div>
            @if ($post->user_id === $currentUserId)
                <div class="mr-8 flex items-center">
                    <form class="delete-form flex items-center" action="{{ route('posts.destroy', $post) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="flex items-center text-red-600 hover:text-red-800" type="submit">
                            <x-icons.icon-trash class="mr-1 h-5 w-5" />
                            削除
                        </button>
                    </form>
                </div>
            @endif

            <p class="text-gray-500">{{ $post->created_at->format(!$isLink ? 'Y年n月j日 H:i' : 'n月j日 H:i') }}</p>
        </div>
    </div>
</div>
