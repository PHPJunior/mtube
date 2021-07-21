<div class="px-4 py-5 bg-white sm:p-6">
    <div class="w-full">
        <div class="items-center flex">
            <input
                id="allow_comments"
                wire:model="settings.allow_comments"
                type="checkbox"
                class="mr-2"
            >
            <label for="allow_comments" class="block text-sm font-medium leading-5 text-gray-700 mr-3">{{ __('Allow Comments') }}</label>
        </div>
        @error('settings.allow_comments')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="w-full mt-4">
        <div class="items-center flex">
            <input
                id="allow_download"
                wire:model="settings.allow_download"
                type="checkbox"
                class="mr-2"
            >
            <label for="allow_download" class="block text-sm font-medium leading-5 text-gray-700 mr-3">{{ __('Allow Download Video') }}</label>
        </div>
        @error('settings.allow_download')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>
</div>
