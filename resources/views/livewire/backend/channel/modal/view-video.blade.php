<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Video Details') }}</h3>
    </x-slot>
    <x-slot name="content">
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
</script>
