<x-app-layout>
    <div class="mt-4" x-data="{ followerModalOpen: false, followingModalOpen: false }">
        <x-users.user-list-modal title="フォロワー" :users="$user->followers" :isFollowerModal="true" open="followerModalOpen" />
        <x-users.user-list-modal title="フォロー中" :users="$user->following" :isFollowerModal="false" open="followingModalOpen" />

        <x-users.user-profile-card :user="$user" />
    </div>
</x-app-layout>
