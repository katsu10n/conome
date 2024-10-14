@props(['user'])

<form action="{{ route('users.follow', $user) }}" method="POST">
    @csrf
    <button
        class="{{ Auth::user()->isFollowing($user) ? 'bg-red-500 hover:bg-red-600' : 'bg-text-light hover:bg-text' }} flex w-full justify-center gap-1 rounded-lg px-4 py-2 font-bold text-bc shadow-md transition ease-in"
        type="submit">
        <span>{{ Auth::user()->isFollowing($user) ? 'フォロー解除' : 'フォローする' }}</span>
    </button>
</form>
