<div class="antialiased">
    <h3 class="mb-2 text-xl font-bold text-gray-900">
        {{ ReadableHumanNumber($comments->total(), $comments->total() >= 1000) }} {{ \Illuminate\Support\Str::plural('comment', $comments->total()) }}
    </h3>

    @auth
        <div class="w-full mb-6 mt-4">
            <div class="w-full md:w-full mb-1">
                <textarea wire:model="comment" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder='Type Your Comment' rows="3" required></textarea>
                @error('comment')
                    <p class="text-sm mt-2 text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex justify-end">
                <div class="flex">
                    <div class="px-4 py-2" wire:loading wire:target="submit">
                        <i class="fas fa-spinner fa-spin"></i>
                    </div>
                    <button type="button" wire:loading.attr="disabled" wire:click="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Post Comment') }}
                    </button>
                </div>
            </div>
        </div>
    @endauth

    <div class="border-t border-gray-100 my-3"></div>
    <div class="space-y-4">
        @foreach($comments as $c)
            @include('livewire.components._partials.parent-comment', ['comment' => $c, 'child' => false, 'owner' => $owner])
        @endforeach
    </div>

    @if($comments->nextPageUrl())
        <div class="flex justify-center mt-6">
            <div wire:loading wire:target="loadMore" class="mr-3">
                <i class="fas fa-spin fa-spinner"></i>
            </div>
            <p class="cursor-pointer" wire:click="loadMore">{{ __('Load More') }}</p>
        </div>
    @endif
</div>
