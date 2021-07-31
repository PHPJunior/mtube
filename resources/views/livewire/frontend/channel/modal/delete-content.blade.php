<x-modal-with-icon>
    <x-slot name="icon">
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
    </x-slot>
    <x-slot name="title">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('Delete Content') }}
        </h3>
    </x-slot>
    <x-slot name="content">
        <p class="text-sm text-gray-500">
            {{ __('Are you sure you want to delete this content? All of your data will be permanently removed. This action cannot be undone.') }}
        </p>
    </x-slot>
    <x-slot name="loading">
        <div
            wire:loading
            wire:target="submit"
            class="px-4 py-2"
        >
            <i class="fas fa-spinner fa-spin"></i>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button wire:click="submit" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            {{ __('Delete') }}
        </button>
    </x-slot>
</x-modal-with-icon>
