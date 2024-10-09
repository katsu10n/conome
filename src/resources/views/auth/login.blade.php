<x-guest-layout>
    <div class="mb-4 text-center">
        <h1 class="mb-1 flex items-center justify-center gap-2 text-3xl font-bold">Conome</h1>
        <h2 class="text-lg">「好き」を共有するSNS</h2>
    </div>
    <form action="{{ route('test-login') }}" method="POST">
        @csrf
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-main-light px-4 py-2 font-bold text-bc shadow-md transition duration-200 ease-in hover:bg-main"
            type="submit">
            <span>テストユーザーでログイン</span>
        </button>
    </form>

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-common.input-label for="email" :value="__('メールアドレス')" />
            <x-common.input-text class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')"
                autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="mt-4">
            <x-common.input-label for="password" :value="__('パスワード')" />

            <x-common.input-text class="mt-1 block w-full" id="password" name="password" type="password"
                autocomplete="current-password" />

            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div class="mt-4 block">
            <label class="inline-flex items-center" for="remember_me">
                <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" id="remember_me"
                    name="remember" type="checkbox">
                <span class="ms-2 text-sm text-gray-600">{{ __('ログイン状態を維持') }}</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れましたか？') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
