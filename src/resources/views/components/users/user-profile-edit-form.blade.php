@props(['user'])

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="name">名前</label>
            <input
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="name" name="name" type="text" value="{{ $user->name }}" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="content">自己紹介</label>
            <textarea
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="content" name="content" rows="3">{{ $user->content }}</textarea>
        </div>
        <div class="flex justify-end space-x-2">
            <button class="w-full rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600" type="submit">
                保存
            </button>
        </div>
    </div>
    <input id="email" name="email" type="hidden" value="{{ $user->email }}">
</form>
