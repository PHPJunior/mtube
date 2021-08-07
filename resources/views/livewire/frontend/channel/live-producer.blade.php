<div class="w-full flex">
    <div class="w-1/3 pr-6">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{ __('Live Producer') }}
        </h2>
        <div class="py-5">
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
            <div class="w-full mt-4">
                @if(!$start)
                    <button wire:click="startLive(true)" type="button" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="-ml-1 mr-2 h-5 w-5 ">
                            <i class="fad fa-signal-stream"></i>
                        </span>
                        {{ __('Start Live') }}
                    </button>
                @else
                    <button wire:click="startLive(false)" type="button" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <span class="-ml-1 mr-2 h-5 w-5 ">
                            <i class="fad fa-pause"></i>
                        </span>
                        {{ __('Stop Live') }}
                    </button>
                @endif
            </div>
        </div>
    </div>
    <div class="w-2/3">
        <div id="player"></div>
        <div class="bg-white rounded-b p-3">
            <div>
                <h2 class="text-lg font-bold text-gray-900">{{ __('Live Stream Setup') }}</h2>
                <p class="text-md">{{ __('Copy and paste these settings into your streaming software.') }}</p>
            </div>
            <div class="w-full mt-4">
                <label for="server_url" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Server URL') }}</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="server_url" type="text" wire:model="server_url" readonly class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                </div>
            </div>
            <div class="border-t border-gray-100"></div>
            <div class="w-full">
                <label for="stream_key" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Stream Key') }}</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="stream_key" type="text" wire:model="stream_key" readonly class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function renderVideoPlayer() {
        let playerElement = document.getElementById("player");
        let aspectRatio = 9/16, newWidth = playerElement.parentElement.offsetWidth, newHeight = 2 * Math.round(newWidth * aspectRatio/2);
        let player = new Clappr.Player({
            source: '{{ $video->video_source }}',
            plugins: [ HlsjsPlayback ],
        })
        player.attachTo(playerElement);
        player.resize({width: newWidth, height: newHeight});
        player.play();
    }
    renderVideoPlayer();
    document.addEventListener('livewire:load', function () {
        @this.on('startLive', () => {
            renderVideoPlayer();
        })
    });
</script>
