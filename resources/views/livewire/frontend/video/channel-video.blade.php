<div>
    @include('livewire.frontend.video._partials.search')
    <div class="h-screen overflow-auto">
        @include('livewire.frontend.video._partials.video-list')
        @if($videos->nextPageUrl())
            <div class="flex justify-center mt-6">
                <div wire:loading wire:target="loadMore" class="mr-3">
                    <i class="fas fa-spin fa-spinner"></i>
                </div>
                <p class="cursor-pointer" wire:click="loadMore">{{ __('Load More') }}</p>
            </div>
        @endif
    </div>
</div>
