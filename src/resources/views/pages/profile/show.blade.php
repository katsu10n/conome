<x-app-layout>
    <div class="">
        <div>
            <p class="mb-2 text-2xl font-bold">{{ $user->name }}</p>
            <p class="mb-2">{{ '@' . $user->uid }}</p>
            <p class="mb-2">{{ $user->content }}</p>
            <div class="flex">
                <p>フォロワー: {{ $user->followers->count() }}</p>
                <p>フォロー中: {{ $user->following->count() }}</p>
            </div>
        </div>
        @if (Auth::id() !== $user->id)
            @if (Auth::user()->isFollowing($user))
                <form action="{{ route('unfollow', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="rounded bg-red-500 px-4 py-2 text-white" type="submit">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', $user) }}" method="POST">
                    @csrf
                    <button class="rounded bg-blue-500 px-4 py-2 text-white" type="submit">フォローする</button>
                </form>
            @endif
        @endif
    </div>
</x-app-layout>
