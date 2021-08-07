<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Create Stream') }}</h3>
    </x-slot>
    <x-slot name="content">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="w-full">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="name" wire:model="name" type="text" placeholder="{{ __('Name') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                </div>
                @error('name')
                <p class="text-sm mt-2 text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="w-full mt-4">
                <label for="description" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Description') }}</label>
                <div class="mt-1 relative rounded-md">
                    <textarea
                        id="description"
                        wire:model="description"
                        rows="5"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    ></textarea>
                </div>
                @error('description')
                <p class="text-sm mt-2 text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mt-4">
                <p class="block text-sm font-medium leading-5 text-gray-700">{{ __('Thumbnail') }}</p>
                <div class="flex w-full">
                    <div class="w-1/3 flex justify-center">
                        <div>
                            <img
                                @if ($photo)
                                src="{{ $photo->temporaryUrl() }}"
                                @else
                                src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                @endif
                                class="object-contain md:object-scale-down rounded h-48" alt=""
                            >
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center rounded border border-dashed">
                        <input type="file" id="photo" accept="image/*" wire:model="photo" class="hidden">
                        <label class="cursor-pointer" for="photo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-44" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <div>
                                <p class="text-center">{{ __('Upload thumbnail') }}</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
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

            <button
                wire:loading.attr="disabled"
                wire:click="submit"
                class="px-4 py-2 border border-transparent
                 text-sm font-medium rounded-md text-white
                 bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-600
                 shadow-sm focus:outline-none focus:shadow-outline-blue  transition duration-150 ease-in-out"
            >
                {{ __('Submit') }}
            </button>
        </div>
    </x-slot>
</x-modal>
