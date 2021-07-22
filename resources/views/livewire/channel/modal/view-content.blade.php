<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Video Details') }}</h3>
    </x-slot>
    <x-slot name="content">
        <div class="flex justify-between items-center px-3">
            <ul class='flex cursor-pointer'>
                <li wire:click="updateTab('details')" class='py-2 pr-10 @if($tab == 'details') bg-white border-b text-indigo-500 @endif'>{{ __('Details') }}</li>
                <li wire:click="updateTab('analytics')" class='py-2 pr-10 @if($tab == 'analytics') bg-white border-b text-indigo-500 @endif'>{{ __('Analytics') }}</li>
                <li wire:click="updateTab('comments')" class='py-2 pr-10 @if($tab == 'comments') bg-white border-b text-indigo-500 @endif'>{{ __('Comments') }}</li>
                <li wire:click="updateTab('thumbnails')" class='py-2 pr-10 @if($tab == 'thumbnails') bg-white border-b text-indigo-500 @endif'>{{ __('Thumbnails') }}</li>
                <li wire:click="updateTab('settings')" class='py-2 pr-10 @if($tab == 'settings') bg-white border-b text-indigo-500 @endif'>{{ __('Settings') }}</li>
            </ul>
            <div wire:loading wire:target="updateTab">
                <i class="fas fa-spin fa-spinner"></i>
            </div>
        </div>

        @if($tab == 'details')
            <div class="p-3">
                <div id="player"></div>
            </div>
            <div class="w-full p-3">
                <h2 class="text-md font-bold leading-5 text-gray-900 sm:text-3xl sm:truncate">{{ $video->name }}</h2>
                <p class="mt-2">{{ $video->description }}</p>
            </div>
            <div class="w-full p-3 flex justify-between items-center">
                <h2 class="font-medium">{{ __('Video Link') }}</h2>
                <a id="video_link mt-1" href="{{ route('watch', ['v' => $video->media_id]) }}" class="text-indigo-500" target="_blank">{{ route('watch', ['v' => $video->media_id]) }}</a>
            </div>
        @endif

        @if($tab == 'comments')
            <div class="px-4 py-6">
                @livewire('components.comment', ['video_id' => $video->id, 'commenter' => $video->channel, 'owner' => true])
            </div>
        @endif

        @if($tab == 'thumbnails')
            @livewire('channel.partial.thumbnail', ['video_id' => $video->id ])
        @endif

        @if($tab == 'analytics')
            @livewire('channel.partial.analytic', ['video_id' => $video->id ])
        @endif

        @if($tab == 'settings')
            @livewire('channel.partial.settings', ['video_id' => $video->id ])
        @endif

    </x-slot>
</x-modal>

<script>
    function renderVideoPlayer() {
        let playerElement = document.getElementById("player");
        let aspectRatio = 9/16, newWidth = playerElement.parentElement.offsetWidth, newHeight = 2 * Math.round(newWidth * aspectRatio/2);

        let player = new Clappr.Player({
            source: '{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->streaming_url) }}',
            plugins: [HlsjsPlayback],
            poster: '{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->thumbnail_url) }}'
        });
        player.attachTo(playerElement);
    }
    renderVideoPlayer();
    @this.on('updateTab', () => {
        renderVideoPlayer();
    })
</script>
