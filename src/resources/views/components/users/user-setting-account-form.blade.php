<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="uid">ユーザーID</label>
            <input
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="uid" name="uid" type="text" value="{{ $user->uid }}" required>
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $user->email)"
                required autocomplete="username" />
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
            <button class="w-full rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600" type="submit">
                保存
            </button>
        </div>
    </div>
    <input id="name" name="name" type="hidden" value="{{ $user->name }}">
</form>
