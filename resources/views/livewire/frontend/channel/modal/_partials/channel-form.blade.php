<div class="px-4 py-5 bg-white sm:p-6">
    <div class="w-full">
        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Channel Name') }}</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input id="name" wire:model="name" type="text" placeholder="{{ __('Add Channel Name') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </div>
        @error('name')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full mt-4">
        <label for="slug" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Slug') }}</label>
        <div class="mt-1 flex flex-wrap items-stretch relative rounded-md shadow-sm">
            <div class="flex -mr-px bg-gray-100">
                <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-3 whitespace-no-wrap text-grey-dark text-sm">{{ env('APP_URL') }}/channel/</span>
            </div>
            <input id="slug" placeholder="Channel URL" wire:model="slug" type="text" class="rounded-r-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-shrink flex-grow flex-auto">
        </div>
        @error('slug')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="w-full mt-4">
        <div class="items-center flex">
            <input
                id="active"
                wire:model="active"
                type="checkbox"
                class="mr-2"
            >
            <label for="active" class="block text-sm font-medium leading-5 text-gray-700 mr-3">Is Active</label>
        </div>
        @error('active')
        <p class="text-sm mt-2 text-red-500">
            {{ $message }}
        </p>
        @enderror
    </div>

    @if($success)
        <p class="text-sm mt-4 text-green-500">
            {{ $success }}
        </p>
    @endif
</div>
