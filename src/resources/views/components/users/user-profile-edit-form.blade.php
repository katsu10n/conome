@props(['user'])

<form class="grid w-full grid-cols-[1fr] gap-2" action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div>
        <label class="mb-1 block text-sm text-text-light" for="name">名前</label>
        <input
            class="w-full flex-1 appearance-none rounded-lg border border-gray px-4 py-2 placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
            id="name" name="name" type="text" value="{{ $user->name }}" required>
    </div>
    <div>
        <label class="mb-1 block text-sm text-text-light" for="content">自己紹介</label>
        <textarea
            class="w-full flex-1 resize-none appearance-none rounded-lg border border-gray px-4 py-2 placeholder-gray-400 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-main"
            id="content" name="content" rows="3">{{ $user->content }}</textarea>
    </div>
    <div class="flex justify-end space-x-2">
        <button
            class="flex w-full justify-center gap-1 rounded-lg bg-main-light px-4 py-2 font-bold text-bc shadow-md transition duration-200 ease-in hover:bg-main"
            type="submit">
            <span>保存する</span>
            <x-icons.icon-save class="relative top-[3px] w-5" />
        </button>
    </div>
    <input id="uid" name="uid" type="hidden" value="{{ $user->uid }}">
    <input id="email" name="email" type="hidden" value="{{ $user->email }}">
</form>
