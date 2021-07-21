<div>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ $channel->name }}
            </h2>
            <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    {{ $channel->subscribers()->count() }}
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Created at').' '.$channel->created_at->format('F j, Y') }}
                </div>
            </div>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="sm:ml-3">
                <button wire:click="$emit('openModal', 'channel.modal.edit-channel', {{ json_encode(["channel_id" => $channel->id]) }})" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Edit Channel') }}
                </button>
            </span>
            <span class="sm:ml-3">
              <button wire:click="$emit('openModal', 'channel.modal.upload-content', {{ json_encode(["channel_id" => $channel->id]) }})" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
                {{ __('Upload Content') }}
              </button>
        </span>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between items-center px-3 mb-3">
            <ul class='flex cursor-pointer'>
                <li wire:click="updateTab('contents')" class='py-2 px-6 @if($tab == 'contents') bg-white border-b text-indigo-500 @endif'>{{ __('Contents') }}</li>
                <li wire:click="updateTab('branding')" class='py-2 px-6 @if($tab == 'branding') bg-white border-b text-indigo-500 @endif'>{{ __('Branding') }}</li>
            </ul>
            <div wire:loading wire:target="updateTab">
                <i class="fas fa-spin fa-spinner"></i>
            </div>
        </div>

        @if($tab == 'contents')
            @livewire('channel.table.videos-table', ['channel_id' => $channel->id ])
        @endif

        @if($tab == 'branding')
            <div class="overscroll-auto overflow-auto min-h-screen">
                <div>
                    <div>
                        <h2 class="font-bold">{{ __('Picture') }}</h2>
                        <p class="text-gray-400">{{ __('Your profile picture will appear where your channel is presented on YouTube, like next to your videos and comments') }}</p>
                    </div>
                    <div class="flex mt-6">
                        <div class="w-1/5 flex justify-center mr-5">
                            <div>
                                <img
                                    @if ($picture)
                                    src="{{ $picture->temporaryUrl() }}"
                                    @else
                                    @if($channel->profile_picture)
                                    src="{{ \Illuminate\Support\Facades\Storage::disk($channel->disk)->url($channel->profile_picture) }}"
                                    @else
                                    src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                    @endif
                                    @endif
                                    class="object-contain md:object-scale-down rounded h-48" alt=""
                                >
                                @if($picture)
                                    <button
                                        wire:loading.attr="disabled"
                                        wire:click="savePicture" type="button" class="mt-2 text-center w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ __('Save') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="w-1/5 content-between">
                            <div>
                                <p class="text-gray-400">{{ __('It’s recommended to use a picture that’s at least 98 x 98 pixels and 4MB or less. Use a PNG or GIF (no animations) file.') }}</p>
                            </div>
                            <div class="mt-6">
                                <input type="file" id="picture" accept="image/*" wire:model="picture" class="hidden">
                                <label class="cursor-pointer" for="picture">
                                    <p>{{ __('Upload') }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('picture')
                    <p class="text-sm mt-2 text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                    @if($picture_success)
                        <p class="text-sm mt-4 text-green-500">
                            {{ $picture_success }}
                        </p>
                    @endif
                </div>

                <div class="mt-12">
                    <div>
                        <h2 class="font-bold">{{ __('Banner Image') }}</h2>
                        <p class="text-gray-400">{{ __('This image will appear across the top of your channel') }}</p>
                    </div>
                    <div class="flex mt-6">
                        <div class="w-1/5 flex justify-center mr-5">
                            <div>
                                <img
                                    @if ($banner)
                                    src="{{ $banner->temporaryUrl() }}"
                                    @else
                                    @if($channel->banner_image)
                                    src="{{ \Illuminate\Support\Facades\Storage::disk($channel->disk)->url($channel->banner_image) }}"
                                    @else
                                    src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                    @endif
                                    @endif
                                    class="object-contain md:object-scale-down rounded h-48" alt=""
                                >
                                @if($banner)
                                    <button
                                        wire:loading.attr="disabled"
                                        wire:click="saveBanner" type="button" class="mt-2 text-center w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ __('Save') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="w-1/5 content-between">
                            <div>
                                <p class="text-gray-400">{{ __('For the best results on all devices, use an image that’s at least 2048 x 1152 pixels and 6MB or less.') }}</p>
                            </div>
                            <div class="mt-6">
                                <input type="file" id="banner" accept="image/*" wire:model="banner" class="hidden">
                                <label class="cursor-pointer" for="banner">
                                    <p>{{ __('Upload') }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('banner')
                    <p class="text-sm mt-2 text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                    @if($banner_success)
                        <p class="text-sm mt-4 text-green-500">
                            {{ $banner_success }}
                        </p>
                    @endif
                </div>

                <div class="mt-12">
                    <div>
                        <h2 class="font-bold">{{ __('Video Watermark') }}</h2>
                        <p class="text-gray-400">{{ __('The watermark will appear on your videos in the right-hand corner of the video player') }}</p>
                    </div>
                    <div class="flex mt-6">
                        <div class="w-1/5 flex justify-center mr-5">
                            <div>
                                <img
                                    @if ($watermark)
                                    src="{{ $watermark->temporaryUrl() }}"
                                    @else
                                    @if($channel->video_watermark)
                                    src="{{ \Illuminate\Support\Facades\Storage::disk($channel->disk)->url($channel->video_watermark) }}"
                                    @else
                                    src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                    @endif
                                    @endif
                                    class="object-contain md:object-scale-down rounded h-48" alt=""
                                >
                                @if($watermark)
                                    <button
                                        wire:loading.attr="disabled"
                                        wire:click="saveWatermark" type="button" class="mt-2 text-center w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ __('Save') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="w-1/5 content-between">
                            <div>
                                <p class="text-gray-400">{{ __('An image that’s 150 x 150 pixels is recommended. Use a PNG, GIF (no animations), BMP, or JPEG file that’s 1MB or less.') }}</p>
                            </div>
                            <div class="mt-6">
                                <input type="file" id="watermark" accept="image/*" wire:model="watermark" class="hidden">
                                <label class="cursor-pointer" for="watermark">
                                    <p>{{ __('Upload') }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('watermark')
                    <p class="text-sm mt-2 text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                    @if($watermark_success)
                        <p class="text-sm mt-4 text-green-500">
                            {{ $watermark_success }}
                        </p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
