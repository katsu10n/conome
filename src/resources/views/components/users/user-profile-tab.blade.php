<ul class="-mb-px flex border-b border-gray-200">
    <li class="flex-1 cursor-pointer">
        <a class="{{ request()->routeIs('profile.show') ? 'border-purple-600 text-purple-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600' }} inline-block w-full rounded-t-lg border-b-2 p-4 text-center"
            href="{{ route('profile.show', $user->uid) }}">
            {{ __('投稿') }}
        </a>
    </li>
    <li class="flex-1 cursor-pointer">
        <a class="{{ request()->routeIs('profile.comments') ? 'border-purple-600 text-purple-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600' }} inline-block w-full rounded-t-lg border-b-2 p-4 text-center"
            href="{{ route('profile.comments', $user->uid) }}">
            {{ __('コメント') }}
        </a>
    </li>
    <li class="flex-1 cursor-pointer">
        <a class="{{ request()->routeIs('profile.likes') ? 'border-purple-600 text-purple-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600' }} inline-block w-full rounded-t-lg border-b-2 p-4 text-center"
            href="{{ route('profile.likes', $user->uid) }}">
            {{ __('いいね') }}
        </a>
    </li>
</ul>
