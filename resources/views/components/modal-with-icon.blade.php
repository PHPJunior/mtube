<div class="align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                {{ $icon }}
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                {{ $title }}
                <div class="mt-2">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
    @isset($footer)
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        {{ $footer }}
        <button onclick="Livewire.emit('closeModal')"  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            {{ __('Cancel') }}
        </button>
        @isset($loading)
            {{ $loading }}
        @endisset
    </div>
    @endif
</div>
