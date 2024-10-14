@props(['title', 'open', 'action', 'method' => 'POST'])

<x-common.modal-card :title="$title" :open="$open">
    <p class="mb-4">{{ $slot }}</p>
    <div class="flex justify-end space-x-2">
        <button class="rounded bg-gray-300 px-4 py-2 transition ease-out hover:bg-gray"
            @click="{{ $open }} = false">
            キャンセル
        </button>
        <form action="{{ $action }}" method="POST">
            @csrf
            @method($method)
            <button class="rounded bg-red-500 px-4 py-2 text-white transition ease-out hover:bg-red-600" type="submit">
                {{ $title }}
            </button>
        </form>
    </div>
</x-common.modal-card>
