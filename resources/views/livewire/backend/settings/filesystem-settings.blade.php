<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6 flex flex-row flex-wrap">
        <div class="w-1/2 p-2 mt-4">
            <label for="aws_access_key_id" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Access Key ID') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_access_key_id" wire:model="aws_access_key_id" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_access_key_id')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="aws_secret_access_key" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Secret Access Key') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_secret_access_key" wire:model="aws_secret_access_key" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_secret_access_key')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="aws_default_region" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Default Region') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_default_region" wire:model="aws_default_region" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_default_region')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="aws_bucket" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Bucket') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_bucket" wire:model="aws_bucket" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_bucket')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="aws_url" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Url') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_url" wire:model="aws_url" type="number" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_url')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="aws_endpoint" class="block text-sm font-medium leading-5 text-gray-700">{{ __('AWS Endpoint') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="aws_endpoint" wire:model="aws_endpoint" type="number" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('aws_endpoint')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-full px-2">
            @if($success)
                <p class="text-sm mt-4 text-green-500">
                    {{ $success }}
                </p>
            @endif
        </div>
    </div>
    <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
        <div
            wire:loading
            wire:target="submit"
            class="px-4 py-2"
        >
            Updating...
        </div>
        <button
            wire:loading.attr="disabled"
            wire:click="submit"
            class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out"
        >
            {{ __('Save') }}
        </button>
    </div>
</div>
