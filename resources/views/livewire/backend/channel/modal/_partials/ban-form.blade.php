<div class="px-4 py-5 bg-white sm:p-6">
    <div class="w-full">
        <label for="comment" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Comment') }}</label>
        <div class="mt-1 relative rounded-md">
                    <textarea
                        id="comment"
                        wire:model="comment"
                        rows="4"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    ></textarea>
        </div>
        @error('comment')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full mt-4">
        <div class="items-center flex">
            <input
                id="permanent"
                wire:model="permanent"
                type="checkbox"
                class="mr-2"
            >
            <label for="permanent" class="block text-sm font-medium leading-5 text-gray-700 mr-3">Is Permanent</label>
        </div>
        @error('permanent')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    @if(!$permanent)
        <div class="w-full mt-4">
            <label for="expire_at" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Expire At') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="expire_at" wire:model="expire_at" type="datetime-local" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('expire_at')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>
    @endif
</div>
