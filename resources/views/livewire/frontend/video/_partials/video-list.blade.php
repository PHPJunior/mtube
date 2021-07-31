<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
    @foreach($videos as $video)
        <div class="w-full overflow-hidden rounded border bg-white shadow mb-1">
            <div class="relative">
                <div class="h-48 bg-cover bg-no-repeat bg-center" style="background-image: url({{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->thumbnail_url) }})" ></div>
                <div style="background-color: rgba(0,0,0,0.6)" class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">{{ gmdate('H:i:s', $video->duration) }}</div>
                <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                    <a href="{{ route('watch', ['v' => $video->media_id]) }}">
                        <img alt="" class="rounded-full border-2 border-white" src="{{ \Illuminate\Support\Facades\Storage::disk($video->channel->disk)->url($video->channel->profile_picture) }}" >
                    </a>
                </div>
            </div>
            <div class="p-3">
                <h3 class="mr-10 text-sm truncate-2nd"><a class="hover:text-blue-500" href="{{ route('watch', ['v' => $video->media_id]) }}">{{ $video->name }}</a></h3>
                <p class="text-xs text-gray-500 mt-1"><a href="{{ route('channel', ['slug' => $video->channel->slug]) }}" class="hover:text-blue-500">{{ $video->channel->name }}</a> • {{ $video->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</div>
