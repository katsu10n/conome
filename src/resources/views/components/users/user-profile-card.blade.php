@props(['user'])

<div class="relative mx-auto flex flex-col items-center rounded-xl border-[1px] border-gray-200 bg-clip-border p-4 shadow-md shadow-[#F3F3F3]"
    x-data="{ editModalOpen: false }">
    <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover">
        <div class="absolute flex h-36 w-full justify-center rounded-xl bg-gray-300 bg-cover"></div>
        <div
            class="absolute -bottom-16 flex h-24 w-24 items-center justify-center rounded-full border-[4px] border-white bg-gray-400">
            <x-icons.icon-user class="h-full w-full text-white" />
        </div>
    </div>
    <div class="mt-20 flex flex-col items-center">
        <div class="flex gap-2">
            @if (Auth::id() !== $user->id)
                <x-users.user-follow-button :user="$user" />
            @else
                <button
                    class="flex w-full justify-center gap-1 rounded-lg border border-gray px-4 py-2 font-bold shadow-md transition ease-in hover:bg-gray-light"
                    @click="editModalOpen = true">
                    <span>プロフィールを編集</span>
                    <x-icons.icon-pencil class="relative top-[5px] w-4" />
                </button>
            @endif
        </div>
        <p class="mt-4 text-xl font-bold">{{ $user->name }}</p>
        <p>{{ '@' . $user->uid }}</p>
        <p class="mt-2 text-text-light">{{ $user->content }}</p>
    </div>
    <div class="mb-3 mt-6 flex gap-14">
        <div class="group flex cursor-pointer flex-col items-center justify-center" title="フォロワー"
            @click="$dispatch('open-follower-modal')">
            <div class="text-center transition ease-in group-hover:opacity-70">
                <p class="text-xl font-bold">
                    {{ $user->followers->count() }}
                </p>
                <p class="text-text-light">フォロワー</p>
            </div>
        </div>
        <div class="group flex cursor-pointer flex-col items-center justify-center" title="フォロー中"
            @click="$dispatch('open-following-modal')">
            <div class="text-center transition ease-in group-hover:opacity-70">
                <p class="text-xl font-bold">
                    {{ $user->following->count() }}
                </p>
                <p class="text-text-light">フォロー中</p>
            </div>
        </div>
    </div>

    <x-common.modal-card title="プロフィールを編集" open="editModalOpen">
        <x-users.user-profile-edit-form :user="$user" />
    </x-common.modal-card>
</div>
