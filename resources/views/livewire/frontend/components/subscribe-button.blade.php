@if($subscribe)
    <button wire:click="unsubscribeChannel" type="button" class="w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        {{ __('Unsubscribe') }}
    </button>
@else
    <button wire:click="subscribeChannel" type="button" class="w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        {{ __('Subscribe') }}
    </button>
@endif
