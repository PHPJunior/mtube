<div class="pt-20 px-4 sm:px-6 lg:px-8 pb-20">
    @include('livewire.video._partials.search')
    <div class="h-screen overflow-auto">
        @include('livewire.video._partials.video-list')
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
