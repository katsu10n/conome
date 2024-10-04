<a class="inline-block rounded-full px-1 py-1 text-left hover:bg-gray-300"
    href="{{ session('previous_url', url()->previous()) }}" onclick="event.preventDefault(); window.history.back();">
    <x-icons.icon-back class="mr-2 inline-block h-6 w-6" />
</a>
<div class="py-2">
    <p class="text-xl font-bold">{{ $main }}</p>
    <p>{{ $sub }}</p>
</div>
