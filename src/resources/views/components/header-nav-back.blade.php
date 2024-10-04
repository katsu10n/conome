<a class="inline-block w-full rounded-t-lg border-b-2 border-transparent p-4 text-center hover:border-gray-300 hover:text-gray-600"
    href="{{ session('previous_url', url()->previous()) }}" onclick="event.preventDefault(); window.history.back();">
    <x-icons.icon-back class="inline-block h-6 w-6" />
    戻る
</a>
