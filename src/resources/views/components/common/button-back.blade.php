@props(['main', 'sub' => ''])

<div class="{{ $sub ? '' : '-mt-2' }} flex w-full items-center">
    <a class="mr-4 inline-block flex-shrink-0 rounded-lg border border-transparent transition hover:text-main"
        href="{{ session('previous_url', url()->previous()) }}" onclick="event.preventDefault(); window.history.back();">
        <x-icons.icon-back class="w-6" />
    </a>

    <div class="min-w-0 flex-grow cursor-pointer py-1" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
        <p class="truncate text-xl font-bold">{{ $main }}</p>
        @if ($sub)
            <p class="truncate text-sm text-text-light">{{ $sub }}</p>
        @endif
    </div>
</div>
