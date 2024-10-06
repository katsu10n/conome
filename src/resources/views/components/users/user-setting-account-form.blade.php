<form class="grid gap-2" action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')

    <div>
        <x-common.input-label for="uid">ユーザーID</x-common.input-label>
        <x-common.input-text id="uid" name="uid" type="text" value="{{ $user->uid }}" required />
    </div>
    <div>
        <x-common.input-label for="email" :value="__('Email')" />
        <x-common.input-text id="email" name="email" type="email" :value="old('email', $user->email)" required
            autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                        form="send-verification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="flex justify-end space-x-2">
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-text-light px-4 py-2 font-bold text-bc shadow-md transition ease-in hover:bg-text"
            type="submit">
            <span>保存する</span>
            <x-icons.icon-save class="relative top-[3px] w-5" />
        </button>
    </div>

    <input id="name" name="name" type="hidden" value="{{ $user->name }}">
</form>
