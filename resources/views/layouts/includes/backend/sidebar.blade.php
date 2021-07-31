<aside class="w-full md:w-64 bg-white md:min-h-screen border border-r-1" x-data="{ isOpen: false }">
    <div class="flex items-center justify-between md:justify-center bg-white p-4 h-16">
        <a href="#" class="flex items-center justify-center">
            <x-logo class="h-16 w-auto" />
        </a>
        <div class="flex md:hidden">
            <button type="button" @click="isOpen = !isOpen"
                    class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="px-2 py-6 md:block" :class="isOpen? 'block': 'hidden'" >
        <ul>
            <li class="w-full items-center pl-4 {{ active(['admin.dashboard'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.dashboard')}}">
                    <i class="fas fa-tv opacity-75 mr-2 text-sm"></i> {{ __('Dashboard') }}
                </a>
            </li>
            <li class="py-3 rounded mt-2">
                <a href="#" class="font-thin">{{ __('Channel') }}</a>
            </li>
            <li class="w-full items-center pl-4 {{ active(['admin.channel'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.channel')}}">
                    <i class="fas fa-list opacity-75 mr-2 text-sm"></i> {{ __('Channels') }}
                </a>
            </li>
            <li class="w-full items-center pl-4 {{ active(['admin.video'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.video')}}">
                    <i class="fas fa-video opacity-75 mr-2 text-sm"></i> {{ __('Videos') }}
                </a>
            </li>
            <li class="w-full items-center pl-4 {{ active(['admin.user'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.user')}}">
                    <i class="fas fa-users opacity-75 mr-2 text-sm"></i> {{ __('Users') }}
                </a>
            </li>
            <li class="py-3 rounded mt-2">
                <a href="#" class="font-thin">{{ __('Access') }}</a>
            </li>
            <li class="w-full items-center pl-4 {{ active(['admin.admin'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.admin')}}">
                    <i class="fas fa-user-plus opacity-75 mr-2 text-sm"></i> {{ __('Admins') }}
                </a>
            </li>
            <li class="w-full items-center pl-4 {{ active(['admin.settings'], 'border-l-2 border-gray-800') }}">
                <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('admin.settings')}}">
                    <i class="fas fa-cogs opacity-75 mr-2 text-sm"></i> {{ __('Settings') }}
                </a>
            </li>
        </ul>
        <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
        <ul class="mt-6 md:hidden">
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="#" class="mx-2 text-gray-300">Account Settings</a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <button class="mx-2 text-gray-300" @click="logout">Logout</button>
            </li>
        </ul>
    </div>
</aside>
