@props(['user'])

@if (Auth::user()->isFollowing($user))
    <form action="{{ route('unfollow', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="rounded bg-red-500 px-3 py-1 text-sm text-white hover:bg-red-600" type="submit">
            フォロー解除
        </button>
    </form>
@else
    <form action="{{ route('follow', $user) }}" method="POST">
        @csrf
        <button class="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600" type="submit">
            フォローする
        </button>
    </form>
@endif
