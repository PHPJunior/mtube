<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Reply Comment') }}</h3>
    </x-slot>
    <x-slot name="content">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                         @if(!$p_comment->commenter->email) src="{{ \Illuminate\Support\Facades\Storage::disk($p_comment->commenter->disk)->url($p_comment->commenter->profile_picture) }}"  @else src="{{ gravatar($p_comment->commenter->email) }}"  @endif
                         alt=""
                    >
                </div>
                <div class="flex-1 border rounded-lg px-2 py-2 sm:px-4 sm:py-4 leading-relaxed">
                    <div class="flex justify-between items-center">
                        <div>
                            <strong class="text-sm md:text-md">{{ $p_comment->commenter->name }}</strong> <span class="text-xs text-gray-400">{{ $p_comment->created_at->format('g:i A') }}</span>
                        </div>
                    </div>
                    <p class="text-sm mt-1">
                        {!! $p_comment->comment !!}
                    </p>
                </div>
            </div>
            <div class="w-full mt-4">
                <div class="mt-1 relative rounded-md">
                    <textarea
                        id="message"
                        wire:model="message"
                        rows="4"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    ></textarea>
                </div>
                @error('message')
                <p class="text-sm mt-2 text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div>
            <div
                wire:loading
                wire:target="submit"
                class="px-4 py-2"
            >
                <i class="fas fa-spinner fa-spin"></i>
            </div>

            <button
                wire:loading.attr="disabled"
                wire:click="submit"
                class="px-4 py-2 border border-transparent
                 text-sm font-medium rounded-md text-white
                 bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-600
                 shadow-sm focus:outline-none focus:shadow-outline-blue  transition duration-150 ease-in-out"
            >
                {{ __('Submit') }}
            </button>
        </div>
    </x-slot>
</x-modal>
