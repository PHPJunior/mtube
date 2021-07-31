<x-dropdown align="right" width="96">
    <x-slot name="trigger">
        <button class="flex rounded-full items-center text-medium font-medium text-gray-600 hover:text-red-600 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            @if($notifications->count())
                <span class="bg-red-500 rounded-full text-xs -ml-2 -mt-3 h-3 w-3"></span>
            @endif
        </button>
    </x-slot>
    <x-slot name="content">
        @if($notifications->count())
            <div class="block px-3 py-2 text-xs text-gray-400 flex justify-between">
                {{ __('Notifications') }}
                <p class="cursor-pointer text-black" wire:click="markAllAsRead">{{ __('Mark all as read') }}</p>
            </div>
            @foreach($notifications as $notification)
                <a href="#" class="flex flex-col justify-start p-3 @if(!$loop->last) border-b @endif cursor-pointer">
                    <p class="text-gray-600 text-sm">
                        <span class="font-bold">{{ $notification->data['by']['name'] }}</span>
                        @switch($notification->data['type'])
                            @case('comment')
                            commented on your video "<span class="font-bold text-blue-500 truncate">{{ $notification->data['on']['name'] }}</span>"
                            @break
                        
                            @case('reply')
                            replied to your comment on "<span class="font-bold text-blue-500 truncate">{{ $notification->data['on']['comment'] }}</span>"
                            @break

                            @case('subscribed')
                            subscribed your channel "<span class="font-bold text-blue-500 truncate">{{ $notification->data['on']['name'] }}</span>"
                            @break

                            @case('liked')
                            liked your video "<span class="font-bold text-blue-500 truncate">{{ $notification->data['on']['name'] }}</span>"
                            @break
                        @endswitch
                    </p>
                    <p class="text-gray-600 text-sm mt-1">
                        {{ $notification->created_at->diffForHumans() }}
                    </p>
                </a>
            @endforeach

            @if($notifications->nextPageUrl())
                <div class="flex justify-center my-2">
                    <div wire:loading wire:target="loadMore" class="mr-3">
                        <i class="fas fa-spin fa-spinner"></i>
                    </div>
                    <p class="cursor-pointer" wire:click="loadMore">{{ __('Load More') }}</p>
                </div>
            @endif
        @else
            <p class="text-center py-4">
                {{ __('No New Notifications!') }}
            </p>
        @endif
    </x-slot>
</x-dropdown>
