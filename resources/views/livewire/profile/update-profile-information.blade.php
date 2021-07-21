<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="w-full">
            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="name" wire:model="name" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Name') }}">
            </div>
            @error('name')
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
    <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
        <button wire:click="save" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out">
            {{ __('Save') }}
        </button>
    </div>
</div>
