<a class="inline-block w-full rounded-t-lg border-b-2 border-transparent p-4 text-center hover:border-gray-300 hover:text-gray-600"
    href="{{ session('previous_url', url()->previous()) }}" onclick="event.preventDefault(); window.history.back();">
    <svg class="mr-1 inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
            clip-rule="evenodd" />
    </svg>
    戻る
</a>
