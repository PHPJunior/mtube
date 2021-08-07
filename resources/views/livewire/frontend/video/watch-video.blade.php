@section('title')
    {{ $video->name }}
@endsection

@section('meta')
<x-social-meta
    card="summary_large_image"
    type="website"
    title="{{ $video->name }}"
    description="{{ $video->description }}"
    url="{{ url()->current() }}"
    image="{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->thumbnail_url) }}"
/>
@endsection

<div class="flex flex-wrap pt-20 px-4 sm:px-6 lg:px-8">
    <div class="w-full @if($video->type == 'upload') xl:w-2/3 @endif">
        <div id="player" class="relative">
            <div class="absolute flex justify-center items-center bg-transparent top-0 right-0 left-0 bottom-0 z-10 p-5 hidden" id="next_video">
                <div class="bg-white">
                    <div class="flex justify-between p-2">
                        <p class="font-bold text-md">{{ __('Next Video') }}</p>
                        <div>
                            <svg
                                onclick="showHideNextVideo()"
                                class="w-6 h-6 cursor-pointer"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                ></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="bg-gray-200">
                            <img
                                class="object-contain md:object-scale-down w-32 h-24"
                                @if($next_video->thumbnail_url)
                                src="{{ \Illuminate\Support\Facades\Storage::disk($next_video->disk)->url($next_video->thumbnail_url) }}"
                                @else
                                src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                @endif
                            >
                        </div>
                        <div class="flex flex-col justify-between px-3 py-1.5">
                            <div>
                                <h3 class="text-md truncate-2nd font-bold">
                                    {{ $next_video->name }}
                                </h3>
                            </div>
                            <div class="flex justify-end">
                                <a class="hover:text-blue-500 text-sm font-bold" href="{{ route('watch', ['v' => $next_video->media_id, 'autoplay' => $autoplay]) }}">{{ __('Play Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center mt-3">
            <div>
                 <h2 class="text-xl font-bold leading-7 text-gray-900 sm:truncate">{{ $video->name }}</h2>
                 <p class="mt-1 text-md text-gray-500">{{ ReadableHumanNumber($view, $view >= 1000) }} {{ \Illuminate\Support\Str::plural('view', $view) }}</p>
            </div>
            <div>
                @livewire('frontend.components.like-dislike-button', ['video_id' => $video->id])
            </div>
        </div>
        <div class="border-t border-gray-100 my-3"></div>
        <div class="flex justify-between items-center">
            <div>
                @livewire('frontend.components.channel-profile', ['channel_id' => $video->channel->id])
            </div>
            <div>
                @guest
                    <a href="{{ route('login') }}" class="w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        {{ __('Subscribe') }}
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->id == $video->channel->owner->id)
                        @livewire('frontend.components.channel-owner-button', ['channel_id' => $video->channel->id])
                    @else
                        @livewire('frontend.components.subscribe-button', ['channel_id' => $video->channel->id])
                    @endif
                @endauth
            </div>
        </div>
        <div class="my-4">
            @if(!$show)
            <p class="truncate">{{ $video->description }}</p>
            @else
            <p>{{ $video->description }}</p>
            @endif
        </div>

        @if($video->description)
            <div class="flex flex-col justify-center">
                @if(!$show)
                    <p class="text-indigo-500 cursor-pointer" wire:click="toggleShowHide">{{ __('Show More') }}</p>
                @else
                    <p class="text-indigo-500 cursor-pointer" wire:click="toggleShowHide">{{ __('Show Less') }}</p>
                @endif
            </div>
        @endif
        <div class="border-t border-gray-100 my-3"></div>
        @if($video->settings()->get('allow_comments', true))
            @livewire('frontend.components.comment', ['video_id' => $video->id, 'commenter' => auth()->user()])
        @else
            <div class="text-center mt-4">
                <p class="text-md font-medium">{{ __('Comments are disabled for this video.') }}</p>
            </div>
        @endif
    </div>
    @if($video->type == 'upload')
    <div class="w-full xl:w-1/3 xl:pl-6">
        <div class="border-t border-gray-100 mt-3 mb-3 md:mt-6 xl:hidden"></div>
        <div class="flex justify-between items-center mb-3">
            <div>
                <h2 class="font-bold text-xl">{{ __('Autoplay') }}</h2>
            </div>
            <label for="autoplay" class="flex items-center cursor-pointer">
                <div class="relative">
                    <input type="checkbox" wire:model="autoplay" id="autoplay" class="autoplay sr-only">
                    <div class="block bg-gray-300 w-12 h-7 rounded-full switch-bg"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition"></div>
                </div>
            </label>
        </div>
        <div class="border-t border-gray-100 my-3"></div>
        <div class="h-96 overflow-auto md:min-h-screen">
            <div class="flex flex-wrap">
                @foreach($upcoming_videos as $uv)
                    <div class="flex mb-4 sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-full">
                        <div class="relative bg-gray-200">
                            <img
                                class="object-contain md:object-scale-down w-32 h-24"
                                @if($uv->thumbnail_url)
                                src="{{ \Illuminate\Support\Facades\Storage::disk($uv->disk)->url($uv->thumbnail_url) }}"
                                @else
                                src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                @endif
                            >
                            <div style="background-color: rgba(0,0,0,0.6)" class="absolute right-0 bottom-0 mb-0 mr-0 ml-3 px-2 py-1 text-sm text-white rounded-tl">{{ gmdate('H:i:s', $uv->duration) }}</div>
                        </div>
                        <div class="flex flex-col justify-between px-3 py-1.5">
                            <div>
                                <h3 class="text-md truncate-2nd">
                                    <a class="hover:text-blue-500 font-bold" href="{{ route('watch', ['v' => $uv->media_id, 'autoplay' => $autoplay]) }}">{{ $uv->name }}</a>
                                </h3>
                            </div>
                            <div>
                                <h3 class="mr-10 text-sm truncate-2nd">
                                    <a href="{{ route('channel', ['slug' => $uv->channel->slug]) }}" class="hover:text-blue-500">{{ $uv->channel->name }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">{{ ReadableHumanNumber(views($uv)->unique()->count(), views($uv)->unique()->count() >= 1000) }} {{ \Illuminate\Support\Str::plural('view', views($uv)->unique()->count()) }} • {{ $uv->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($upcoming_videos->nextPageUrl())
                <div class="flex justify-center mt-6">
                    <div wire:loading wire:target="loadMore" class="mr-3">
                        <i class="fas fa-spin fa-spinner"></i>
                    </div>
                    <p class="cursor-pointer" wire:click="loadMore">{{ __('Load More') }}</p>
                </div>
            @endif
        </div>
    </div>
    @endif
</div>
<script>
    function showHideNextVideo() {
        let video = document.getElementById('next_video');
        video.classList.toggle("hidden");
    }

    function renderVideoPlayer() {
        let playerElement = document.getElementById("player");
        let aspectRatio = 9/16, newWidth = playerElement.parentElement.offsetWidth, newHeight = 2 * Math.round(newWidth * aspectRatio/2);

        const DownloadVideo = Clappr.UICorePlugin.extend({
            name: 'download_video_plugin',
            bindEvents: function() {
                this.listenToOnce(this.core, Clappr.Events.CORE_READY, function () {
                    this.listenTo(this.core.mediaControl, Clappr.Events.MEDIACONTROL_RENDERED, this.render);
                });
            },
            render: function() {
                if(this.options.downloadVideo.show === '1'){
                    this.renderButton();
                    this.core.mediaControl.$('.media-control-right-panel').append(this.el);
                }
                return this;
            },
            renderButton: function() {
                let vm = this;
                if (this.$div) return;
                this.$el
                    .css({
                        'float': 'right',
                        'position': 'relative',
                        'height': '100%',
                        'margin-left': '4px',
                        'margin-right': '4px'
                    });
                this.$div = $('<button />')
                    .css({
                        'background-color': 'transparent',
                        'height': '100%',
                        'cursor': 'pointer',
                        'color': '#FFF',
                        'font-size': '12px'
                    })
                    .html('Download')
                    .on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        window.open(vm.options.downloadVideo.url);
                    });
                this.$el.append(this.$div);
            },
        });

        let player = new Clappr.Player({
            source: '{{ $video->video_source }}',
            plugins: [HlsjsPlayback, LevelSelector, DownloadVideo],
            poster: '{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->thumbnail_url) }}',
            width: '100%',
            watermark: '{{ \Illuminate\Support\Facades\Storage::disk($video->channel->disk)->url($video->channel->video_watermark) }}',
            watermarkLink: '{{ route('channel', ['slug' => $video->channel->slug]) }}',
            mediacontrol: {
                seekbar: "#FF0000", buttons: "#FFF"
            },
            downloadVideo: {
                show: '{{ $video->settings()->get('allow_download', false) }}',
                url: '{{ \Illuminate\Support\Facades\Storage::disk($video->disk)->url($video->path) }}'
            },
            events: {
                onEnded: function() {
                    showHideNextVideo();
                }
            }
        });
        player.attachTo(playerElement);
        player.resize({width: newWidth, height: newHeight});
        @if($autoplay)
        player.play();
        @endif
    }
    renderVideoPlayer();
    document.addEventListener('livewire:load', function () {
        @this.on('showHideDescription', () => {
            renderVideoPlayer();
        })
        @this.on('loadMore', () => {
            renderVideoPlayer();
        })
    });
</script>
