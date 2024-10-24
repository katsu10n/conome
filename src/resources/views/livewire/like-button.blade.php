<button
    class="like-button {{ $isLiked ? 'text-red-500 hover:opacity-70' : 'hover:text-red-500' }} mr-2 flex items-center transition"
    type="button" wire:click="toggleLike">
    <x-icons.icon-heart class="{{ $isLiked ? 'fill-current' : '' }} w-6" />
    <span class="like-count ml-2 text-sm">{{ $likesCount }}</span>
</button>
