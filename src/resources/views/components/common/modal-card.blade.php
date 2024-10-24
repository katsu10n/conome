@props(['open', 'title' => ''])

<div x-data="{ initialized: false }" x-init="$nextTick(() => { initialized = true })" x-cloak>
    <div class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true"
        x-show="{{ $open }} && initialized" @close-modal.window="{{ $open }} = false">
        <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                x-show="{{ $open }} && initialized" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" @click="{{ $open }} = false"></div>
            <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
            <div class="inline-block w-full transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:max-w-lg sm:align-middle"
                x-show="{{ $open }} && initialized" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="bg-bc p-4">
                    @if ($title)
                        <div class="flex items-center gap-2 pb-2 text-center text-lg font-bold leading-6"
                            id="modal-title">
                            <x-icons.icon-close
                                class="inline-block w-6 flex-shrink-0 cursor-pointer transition hover:text-main"
                                @click="$dispatch('close-modal')" />
                            <h3>{{ $title }}</h3>
                        </div>
                    @endif
                    <div class="mt-2">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
