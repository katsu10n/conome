<ul class="-mb-px flex w-full border-b border-gray-200">
    <li class="flex-1 cursor-pointer">
        <a class="{{ !request()->routeIs('posts.followed') && !request()->routeIs('posts.category.followed') ? 'border-purple-600 text-purple-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600' }} inline-block w-full rounded-t-lg border-b-2 p-4 text-center"
            href="{{ request()->route('category') ? route('posts.category', request()->route('category')) : route('posts.index') }}">
            {{ __('全ユーザー') }}
        </a>
    </li>
    <li class="flex-1 cursor-pointer">
        <a class="{{ request()->routeIs('posts.followed') || request()->routeIs('posts.category.followed') ? 'border-purple-600 text-purple-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600' }} inline-block w-full rounded-t-lg border-b-2 p-4 text-center"
            href="{{ request()->route('category')
                ? route('posts.category.followed', request()->route('category'))
                : route('posts.followed') }}">
            {{ __('フォロー中') }}
        </a>
    </li>
</ul>
