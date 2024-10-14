@props(['open', 'action', 'method' => 'POST', 'confirmText' => '確認'])

<x-common.modal-card :open="$open">
    <p class="-mt-2 mb-4 text-center">{{ $slot }}</p>
    <div class="flex justify-center space-x-2">
        <button class="rounded bg-gray-300 px-4 py-2 transition ease-out hover:bg-gray"
            @click="{{ $open }} = false">
            キャンセル
        </button>
        <form action="{{ $action }}" method="POST">
            @csrf
            @method($method)
            <button class="rounded bg-red-500 px-4 py-2 text-white transition ease-out hover:bg-red-600" type="submit">
                {{ $confirmText }}
            </button>
        </form>
    </div>
</x-common.modal-card>
