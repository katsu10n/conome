@props(['user'])

@if (Auth::user()->isFollowing($user))
    <form action="{{ route('unfollow', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-red-500 px-4 py-2 font-bold text-bc shadow-md transition ease-in hover:bg-red-600"
            type="submit">
            <span>フォロー解除</span>
        </button>
    </form>
@else
    <form action="{{ route('follow', $user) }}" method="POST">
        @csrf
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-text-light px-4 py-2 font-bold text-bc shadow-md transition ease-in hover:bg-text"
            type="submit">
            フォローする
        </button>
    </form>
@endif
