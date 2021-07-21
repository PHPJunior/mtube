<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="w-full">
            <label for="current_password" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Current Password') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="current_password" wire:model="current_password" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Current Password') }}">
            </div>
            @error('current_password')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-full mt-4">
            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">{{ __('New Password') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="password" wire:model="password" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('New Password') }}">
            </div>
            @error('password')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-full mt-4">
            <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Confirm Password') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="password_confirmation" wire:model="password_confirmation" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Confirm Password') }}">
            </div>
            @error('password_confirmation')
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
