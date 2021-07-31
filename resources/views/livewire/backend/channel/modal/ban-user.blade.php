<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Ban User') }} : {{ $model->name }}</h3>
    </x-slot>
    <x-slot name="content">
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
    </x-slot>
    <x-slot name="footer">
        <div>
            <div
                wire:loading
                wire:target="submit"
                class="px-4 py-2"
            >
                <i class="fas fa-spinner fa-spin"></i>
            </div>

            <button wire:loading.attr="disabled" wire:click="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out">
                {{ __('Submit') }}
            </button>
        </div>
    </x-slot>
</x-modal>
