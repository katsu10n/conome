<x-app-layout>
    <div class="mt-4" x-data="{ followerModalOpen: false, followingModalOpen: false }">
        <x-users.user-list-modal title="フォロワー" :users="$user->followers" :isFollowerModal="true" open="followerModalOpen" />
        <x-users.user-list-modal title="フォロー中" :users="$user->following" :isFollowerModal="false" open="followingModalOpen" />

        <div
            class="relative mx-auto flex flex-col items-center rounded-xl border-[1px] border-gray-200 bg-clip-border p-4 shadow-md shadow-[#F3F3F3]">
            <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover">
                <div class="absolute flex h-36 w-full justify-center rounded-xl bg-gray-300 bg-cover"></div>
                <div
                    class="absolute -bottom-16 flex h-24 w-24 items-center justify-center rounded-full border-[4px] border-white bg-gray-400">
                    <x-icons.icon-user class="h-full w-full text-white" />
                </div>
            </div>
            <div class="mt-20 flex flex-col items-center">
                <div>
                    @if (Auth::id() !== $user->id)
                        <x-users.user-follow-button :user="$user" />
                    @else
                        <a class="bg-navy-600 hover:bg-navy-700 mt-4 rounded-md px-4 py-2"
                            href="{{ route('profile.edit', $user->uid) }}">プロフィールを編集</a>
                    @endif
                </div>
                <p class="mt-4 text-xl font-bold">{{ $user->name }}</p>
                <p>{{ '@' . $user->uid }}</p>
                <p class="mt-2">{{ $user->content }}</p>
            </div>
            <div class="mb-3 mt-6 flex gap-14">
                <div class="flex cursor-pointer flex-col items-center justify-center hover:text-gray-600"
                    @click="followerModalOpen = true">
                    <p class="text-navy-700 text-xl font-bold">
                        {{ $user->followers->count() }}
                    </p>
                    <p>
                        フォロワー
                    </p>
                </div>
                <div class="flex cursor-pointer flex-col items-center justify-center hover:text-gray-400"
                    @click="followingModalOpen = true">
                    <p class="text-navy-700 text-xl font-bold">
                        {{ $user->following->count() }}
                    </p>
                    <p>
                        フォロー中
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
