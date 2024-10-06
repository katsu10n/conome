@props(['users', 'isFollowerModal', 'open', 'title'])

<x-common.modal-card :title="$title" :open="$open">
    <div class="space-y-4">
        @foreach ($users as $user)
            <div class="flex items-center justify-between">
                <div class="min-w-0 flex-1">
                    <p>
                        <a class="truncate font-semibold hover:underline"
                            href="{{ route('profile.show', $user->uid) }}">{{ $user->name }}
                        </a>
                    </p>
                    <p>
                        <a class="truncate text-sm text-gray-600 hover:underline"
                            href="{{ route('profile.show', $user->uid) }}">{{ '@' . $user->uid }}
                        </a>
                    </p>
                </div>
                @if (Auth::id() !== $user->id)
                    <x-users.user-follow-button :user="$user" />
                @endif
            </div>
        @endforeach
    </div>
</x-common.modal-card>
