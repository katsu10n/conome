@props(['comments'])

@foreach ($comments as $comment)
    <div
        class="comment post-container my-4 grid grid-cols-[auto,1fr] grid-rows-[auto,1fr] gap-2 rounded-xl border p-3 pb-2 shadow-md transition-shadow duration-200">
        <a class="user-link row-span-2 block truncate font-bold hover:underline"
            href="{{ route('profile.show', $comment->user->uid) }}">
            <x-icons.icon-user class="w-10 text-gray-400" />
        </a>
        <div class="flex min-w-0 flex-col">
            <div class="flex items-center justify-between gap-2">
                <div class="flex min-w-0 flex-1 items-center gap-2">
                    <a class="user-link truncate font-bold hover:underline"
                        href="{{ route('profile.show', $comment->user->uid) }}">
                        {{ $comment->user->name }}
                    </a>
                </div>
                <div class="relative ml-auto inline-block whitespace-nowrap text-sm">
                    <div class="absolute inset-0 flex text-text-light">
                        <svg height="100%" viewBox="0 0 50 100">
                            <path
                                d="M49.9,0a17.1,17.1,0,0,0-12,5L5,37.9A17,17,0,0,0,5,62L37.9,94.9a17.1,17.1,0,0,0,12,5ZM25.4,59.4a9.5,9.5,0,1,1,9.5-9.5A9.5,9.5,0,0,1,25.4,59.4Z"
                                fill="currentColor" />
                        </svg>
                        <div class="-ml-px h-full flex-grow rounded-md rounded-l-none bg-text-light"></div>
                    </div>
                </div>
            </div>
            <div class="min-w-0">
                <a class="user-link text-textLight" href="{{ route('profile.show', $comment->user->uid) }}">
                    {{ '@' . $comment->user->uid }}
                </a>
                <p class="pt-1">{{ $comment->content }}</p>
            </div>
        </div>
        <div class="flex items-end justify-between pt-1">
            <div class="post-dropdown -mb-[5px]">
                <x-comments.comment-nav-dropdown :comment="$comment" />
            </div>

            <p class="text-textLight text-sm">
                {{ $comment->created_at->format('Y年n月j日 H:i') }}</p>
        </div>
    </div>
@endforeach
