<form class="grid gap-2" method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div>
        <x-common.input-label for="update_password_current_password" :value="__('現在のパスワード')" />
        <x-common.input-text id="update_password_current_password" name="current_password" type="password"
            autocomplete="current-password" />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
    </div>

    <div>
        <x-common.input-label for="update_password_password" :value="__('新しいパスワード')" />
        <x-common.input-text id="update_password_password" name="password" type="password"
            autocomplete="new-password" />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
    </div>

    <div>
        <x-common.input-label for="update_password_password_confirmation" :value="__('新しいパスワード（確認）')" />
        <x-common.input-text id="update_password_password_confirmation" name="password_confirmation" type="password"
            autocomplete="new-password" />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
    </div>

    <div class="flex items-center gap-4">
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-text-light px-4 py-2 font-bold text-bc shadow-md transition ease-in hover:bg-text"
            type="submit">
            <span>保存する</span>
            <x-icons.icon-save class="relative top-[3px] w-5" />
        </button>

        @if (session('status') === 'password-updated')
            <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
                x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
