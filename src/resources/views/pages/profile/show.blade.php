<x-app-layout>
    <x-slot name="backButton">
        @php
            $subText = match (true) {
                request()->routeIs('profile.show') => "{$user->posts_count} 件の投稿",
                request()->routeIs('profile.comments') => "{$user->comments_count} 件のコメント",
                request()->routeIs('profile.likes') => "{$user->likes_count} 件のいいね",
                default => '',
            };
        @endphp
        <x-common.button-back :main="$user->name" :sub="$subText" />
    </x-slot>

    <div class="mt-4" x-data="{ followerModalOpen: false, followingModalOpen: false }" @open-follower-modal.window="followerModalOpen = true"
        @open-following-modal.window="followingModalOpen = true">
        <x-users.user-list-modal title="フォロワー" :users="$user->followers" :isFollowerModal="true" open="followerModalOpen" />
        <x-users.user-list-modal title="フォロー中" :users="$user->following" :isFollowerModal="false" open="followingModalOpen" />

        <x-users.user-profile-card :user="$user" />
        <x-users.user-profile-tab :user="$user" />
        <x-users.user-profile-tab-content :posts="$posts" />
    </div>
</x-app-layout>
