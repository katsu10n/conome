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

        @if (Auth::id() !== $user->id)
            <x-users.user-follow-button :user="$user" />
        @endif

        <x-users.user-list-modal title="フォロワー" :users="$user->followers" :isFollowerModal="true" open="followerModalOpen" />

        <x-users.user-list-modal title="フォロー中" :users="$user->following" :isFollowerModal="false" open="followingModalOpen" />
    </div>
</x-app-layout>
