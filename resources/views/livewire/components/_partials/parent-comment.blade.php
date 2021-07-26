<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full @if($child) w-6 h-6 sm:w-8 sm:h-8 @else w-8 h-8 sm:w-10 sm:h-10 @endif"
             @if(!$comment->commenter->email) src="{{ \Illuminate\Support\Facades\Storage::disk($comment->commenter->disk)->url($comment->commenter->profile_picture) }}"  @else src="{{ gravatar($comment->commenter->email) }}"  @endif
             alt=""
        >
    </div>
    <div class="flex-1 border rounded-lg px-2 py-2 sm:px-4 sm:py-4 leading-relaxed">
        <div class="flex justify-between items-center">
            <div>
                <strong class="text-sm @if(!$comment->commenter->email) md:text-xs bg-gray-300 rounded p-1 @else md:text-md @endif">{{ $comment->commenter->name }}</strong> <span class="text-xs text-gray-400">{{ $comment->created_at->format('g:i A') }}</span>
            </div>
            @auth
                @if(($comment->commenter->id == auth()->user()->id && $comment->commenter->email) || $owner)
                    <div class="flex justify-between items-center">
                        <a wire:click="$emit('openModal','video.modal.edit-comment', {{ json_encode(["comment_id" => $comment->id]) }})" class="cursor-pointer text-blue-600 text-sm md:text-md font-medium hover:text-blue-900 mr-2">Edit</a>
                        <a wire:click="$emit('openModal','video.modal.delete-comment', {{ json_encode(["comment_id" => $comment->id]) }})" class="cursor-pointer text-red-600 text-sm md:text-md font-medium hover:text-red-900">Delete</a>
                    </div>
                @endif
            @endauth
        </div>
        <p class="text-sm mt-1">
            {!! $comment->comment !!}
        </p>
        <div class="flex justify-between @if($comment->children()->count()) my-5 @else mt-5 @endif">
            <h4 class="uppercase tracking-wide text-gray-400 font-bold text-xs">{{ ReadableNumber($comment->children()->count(), $comment->children()->count() >= 1000) }} {{ \Illuminate\Support\Str::plural('Reply', $comment->children()->count()) }}</h4>
            @auth
            <h4 wire:click="$emit('openModal','video.modal.reply-comment', {{ json_encode(["comment_id" => $comment->id, 'commenter' => $commenter, 'owner' => $owner]) }})" class="uppercase tracking-wide text-indigo-500 font-bold text-xs cursor-pointer">Reply</h4>
            @endauth
        </div>
        @if($comment->children()->count())
            <div class="space-y-4">
                @foreach($comment->children()->get() as $cc)
                    @include('livewire.components._partials.parent-comment', ['comment' => $cc, 'child' => true])
                @endforeach
            </div>
        @endif
    </div>
</div>
