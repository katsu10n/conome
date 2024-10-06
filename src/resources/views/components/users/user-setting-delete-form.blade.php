<x-danger-button x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('アカウント削除') }}</x-danger-button>

<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form class="p-6" method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('本当にアカウントを削除しますか？') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('アカウントを削除すると、そのすべてのリソースとデータが完全に削除されます。') }}<br />
            {{ __('アカウントを完全に削除するにはパスワードを入力してください。') }}
        </p>

        <div class="mt-6">
            <x-common.input-label class="sr-only" for="password" value="{{ __('パスワード') }}" />

            <x-common.input-text class="mt-1 block w-3/4" id="password" name="password" type="password"
                placeholder="{{ __('パスワード') }}" />

            <x-input-error class="mt-2" :messages="$errors->userDeletion->get('password')" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('キャンセル') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('アカウント削除') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
