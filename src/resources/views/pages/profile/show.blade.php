<x-app-layout>
    <div x-data="{ followerModalOpen: false, followingModalOpen: false }">
        <div>
            <p class="mb-2 text-2xl font-bold">{{ $user->name }}</p>
            <p class="mb-2">{{ '@' . $user->uid }}</p>
            <p class="mb-2">{{ $user->content }}</p>
            <div class="flex space-x-4">
                <button class="text-blue-500 hover:underline" @click="followerModalOpen = true">
                    フォロワー: {{ $user->followers->count() }}
                </button>
                <button class="text-blue-500 hover:underline" @click="followingModalOpen = true">
                    フォロー中: {{ $user->following->count() }}
                </button>
            </div>
        </div>

        <x-users.user-follow-modal title="フォロワー" open="followerModalOpen">
            <x-slot name="content">
                <div class="space-y-4">
                    @foreach ($user->followers as $follower)
                        <div class="flex items-center justify-between">
                            <div>
                                <a class="font-semibold hover:underline"
                                    href="{{ route('profile.show', $follower->uid) }}">{{ $follower->name }}</a><br>
                                <a class="text-sm text-gray-600 hover:underline"
                                    href="{{ route('profile.show', $follower->uid) }}">{{ '@' . $follower->uid }}</a>
                            </div>
                            @if (Auth::id() !== $follower->id)
                                <x-users.user-follow-button :user="$follower" />
                            @endif
                        </div>
                    @endforeach
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="rounded bg-gray-300 px-4 py-2 text-gray-800 hover:bg-gray-400"
                    @click="followerModalOpen = false">
                    閉じる
                </button>
            </x-slot>
        </x-users.user-follow-modal>

        <x-users.user-follow-modal title="フォロー中" open="followingModalOpen">
            <x-slot name="content">
                <div class="space-y-4">
                    @foreach ($user->following as $following)
                        <div class="flex items-center justify-between">
                            <div>
                                <a class="font-semibold hover:underline"
                                    href="{{ route('profile.show', $following->uid) }}">{{ $following->name }}</a><br>
                                <a class="text-sm text-gray-600 hover:underline"
                                    href="{{ route('profile.show', $following->uid) }}">{{ '@' . $following->uid }}</a>
                            </div>
                            @if (Auth::id() !== $following->id)
                                <x-users.user-follow-button :user="$following" />
                            @endif
                        </div>
                    @endforeach
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="rounded bg-gray-300 px-4 py-2 text-gray-800 hover:bg-gray-400"
                    @click="followingModalOpen = false">
                    閉じる
                </button>
            </x-slot>
        </x-users.user-follow-modal>
    </div>
</x-app-layout>
