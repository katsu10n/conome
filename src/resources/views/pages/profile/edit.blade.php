@props(['user'])

<x-app-layout>
    <x-slot name="backButton">
        <x-common.button-back main="設定" />
    </x-slot>

    <div class="grid gap-10">
        <div>
            <h2 class="text-xl font-bold">アカウント情報</h2>
            <x-users.user-setting-account-form :user="$user" />
        </div>
        <div>
            <h2 class="text-xl font-bold">パスワード変更</h2>
            <x-users.user-setting-password-form :user="$user" />
        </div>
        <div>
            <x-users.user-setting-delete-form :user="$user" />
        </div>
    </div>

</x-app-layout>
