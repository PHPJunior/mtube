<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6 flex flex-row flex-wrap">
        <div class="w-full p-2">
            <label for="converted_file_driver" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Converted Video Driver') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <select id="converted_file_driver" wire:model="converted_file_driver" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="local">Local Disk</option>
                    <option value="public">Public</option>
                    <option value="s3">S3</option>
                </select>
            </div>
            @error('converted_file_driver')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="hls_segment_size" class="block text-sm font-medium leading-5 text-gray-700">{{ __('HLS Segment Size') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="hls_segment_size" wire:model="hls_segment_size" type="number" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('hls_segment_size')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="frame_from_seconds" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Thumbnail From Seconds') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="frame_from_seconds" wire:model="frame_from_seconds" type="number" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </div>
            @error('frame_from_seconds')
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
