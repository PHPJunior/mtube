<div class="hidden md:block">
    <a href="{{ route('user.channels.show', ['id' => $channel->id]) }}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ __('Customize Channel') }}
    </a>
    <a href="{{ route('user.channels.show', ['id' => $channel->id]) }}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ __('Manage Videos') }}
    </a>
</div>

<div class="md:hidden">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-medium font-medium text-gray-600 hover:text-red-600 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div class="mr-2">
                    <i class="fas fa-ellipsis-v-alt"></i>
                </div>
            </button>
        </x-slot>
        <x-slot name="content">
            <x-dropdown-link :href="route('user.channels.show', ['id' => $channel->id])">
                {{ __('Customize Channel') }}
            </x-dropdown-link>
            <div class="border-t border-gray-100"></div>
            <x-dropdown-link :href="route('user.channels.show', ['id' => $channel->id])">
                {{ __('Manage Videos') }}
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>
