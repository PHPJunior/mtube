<div class="flex justify-between gap-2">
    <div @auth wire:click="likeVideo" @endauth class="flex items-center text-sm text-gray-500 cursor-pointer mr-2">
        <i class="@guest fal @else @if(auth()->user()->hasUpVoted($video)) fas text-green-500 @else fal @endif @endguest fa-arrow-alt-up flex-shrink-0 mr-2 text-xl"></i>
        <p class="text-xl">{{ ReadableHumanNumber($video->upVoters()->count(), $video->upVoters()->count() >= 1000) }}</p>
    </div>
    <div @auth wire:click="dislikeVideo" @endauth class="flex items-center text-sm text-gray-500 cursor-pointer">
        <i class="@guest fal @else @if(auth()->user()->hasDownVoted($video)) fas text-red-500 @else fal @endif @endguest fa-arrow-alt-down flex-shrink-0 mr-2 text-xl"></i>
        <p class="text-xl">{{ ReadableHumanNumber($video->downVoters()->count(), $video->downVoters()->count() >= 1000) }}</p>
    </div>
</div>
