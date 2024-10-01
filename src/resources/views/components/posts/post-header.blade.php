<nav class="text-center text-sm font-medium text-gray-500">
    <ul class="-mb-px flex border-b border-gray-200">
        <li class="flex-1 cursor-pointer">
            <a class="inline-block w-full rounded-t-lg border-b-2 border-transparent p-4 text-center hover:border-gray-300 hover:text-gray-600"
                :href="route('posts.index')">
                {{ __('全ユーザー') }}
            </a>
        </li>
        <li class="flex-1 cursor-pointer">
            <a class="active inline-block w-full rounded-t-lg border-b-2 border-purple-600 p-4 text-purple-600"
                aria-current="page" :href="route('posts.index')">
                {{ __('フォロー中') }}
            </a>
        </li>
    </ul>
</nav>
