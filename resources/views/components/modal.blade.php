<div>
    <div class="px-4 py-5 flex justify-between items-center">
        {{ $title }}
        <div>
            <svg
                onclick="Livewire.emit('closeModal')"
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

    <div class="bg-white shadow overflow-hidden sm:rounded-md mt-2">
        {{ $content }}
    </div>

    @isset($footer)
        <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-between items-center">
            <a onclick="Livewire.emit('closeModal')" class="cursor-pointer font-semibold text-gray-600">{{ __('Cancel') }}</a>
            <div>
                {{ $footer }}
            </div>
        </div>
    @endisset
</div>
