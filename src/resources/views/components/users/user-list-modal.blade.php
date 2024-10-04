@props(['title', 'users', 'isFollowerModal', 'open'])

<div class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true" x-show="{{ $open }}">
    <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
            x-show="{{ $open }}" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            @click="{{ $open }} = false"></div>
        <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
        <div class="inline-block w-full transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:max-w-lg sm:align-middle"
            x-show="{{ $open }}" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="bg-white p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                <div class="mt-4 space-y-4">
                    @foreach ($users as $user)
                        <div class="flex items-center justify-between">
                            <div>
                                <a class="font-semibold hover:underline"
                                    href="{{ route('profile.show', $user->uid) }}">{{ $user->name }}</a><br>
                                <a class="text-sm text-gray-600 hover:underline"
                                    href="{{ route('profile.show', $user->uid) }}">{{ '@' . $user->uid }}</a>
                            </div>
                            @if (Auth::id() !== $user->id)
                                <x-users.user-follow-button :user="$user" />
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button class="rounded bg-gray-300 px-4 py-2 text-gray-800 hover:bg-gray-400" type="button"
                    @click="{{ $open }} = false">閉じる</button>
            </div>
        </div>
    </div>
</div>
