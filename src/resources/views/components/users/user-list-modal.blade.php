@props(['users', 'isFollowerModal', 'open'])

<x-common.modal-card :open="$open">
    <div class="space-y-4">
        @foreach ($users as $user)
            <div class="flex items-center justify-between">
                <div>
                    <a class="font-semibold hover:underline"
                        href="{{ route('profile.show', $user->uid) }}">{{ $user->name }}</a><br>
                    <a class="text-sm text-gray-600 hover:underline"
                        href="{{ route('profile.show', $user->uid) }}">{{ '@' . $user->uid }}</a>
                </div>
                @if (Auth::id() !== $user->id)
                    <x-users.user-follow-button :user="$user" />
                @endif
            </div>
        @endforeach
    </div>
</x-common.modal-card>
