<div class="py-3">
    <p class="px-3 my-3">{{ __("Select or upload a picture that shows what's in your video. A good thumbnail stands out and draws viewers' attention.") }}</p>
    <div class="flex">
        <div class="w-1/3 flex justify-center">
            <div>
                <img
                    @if ($photo)
                        src="{{ $photo->temporaryUrl() }}"
                    @else
                        @if($video->thumbnail_url)
                            src="{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->thumbnail_url) }}"
                        @else
                            src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                        @endif
                    @endif
                    class="object-contain md:object-scale-down rounded h-48" alt=""
                >
                @if($photo)
                    <button
                        wire:loading.attr="disabled"
                        wire:click="saveThumbnail" type="button" class="mt-2 w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ __('Save Thumbnail') }}
                    </button>
                @endif
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
{{--    <div class="border-t border-gray-100 my-3"></div>--}}
{{--    <div class="flex flex-wrap ">--}}
{{--        @foreach($thumbnails as $thumbnail)--}}
{{--            <div class="w-1/3 mb-2">--}}
{{--                <div>--}}
{{--                    <img src="{{ $thumbnail['img'] }}" class="object-contain md:object-scale-down rounded h-48" alt="">--}}
{{--                    <button  wire:loading.attr="disabled" wire:click="saveThumbnailFromVideo({{ $thumbnail['seconds'] }})" type="button" class="mt-2 w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />--}}
{{--                        </svg>--}}
{{--                        {{ __('Set As Thumbnail') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

    <div class="flex justify-between">
        <div>
            @error('photo')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
            @if($success)
                <p class="text-sm mt-4 text-green-500">
                    {{ $success }}
                </p>
            @endif
        </div>
        <div wire:loading wire:target="saveThumbnail">
            <i class="fas fa-spin fa-spinner"></i>
        </div>
        <div wire:loading wire:target="saveThumbnailFromVideo">
            <i class="fas fa-spin fa-spinner"></i>
        </div>
    </div>
</div>
