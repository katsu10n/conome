<x-app-layout>
    <div class="">
        <div>
            <p class="mb-2 text-2xl font-bold">{{ $user->name }}</p>
            <p class="mb-2">{{ '@' . $user->uid }}</p>
            <p class="mb-2">{{ $user->content }}</p>
            <div class="flex">
                <p>○ フォロー中</p>
                <p>○ フォロワー</p>
            </div>
        </div>
    </div>
</x-app-layout>
