@props(['main', 'sub' => ''])

<div class="{{ $sub ? '' : '-mt-2' }} flex w-full items-center">
    <a class="mr-4 inline-block flex-shrink-0 rounded-lg border border-transparent p-2 hover:border-gray-300 hover:bg-gray-100"
        href="{{ session('previous_url', url()->previous()) }}" onclick="event.preventDefault(); window.history.back();">
        <x-icons.icon-back class="h-6 w-6" />
    </a>

    <div class="min-w-0 flex-grow cursor-pointer py-2" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
        <p class="truncate text-xl font-bold">{{ $main }}</p>
        @if ($sub)
            <p class="truncate text-sm text-gray-600">{{ $sub }}</p>
        @endif
    </div>
</div>
