<ul class="fixed">
    <li class=" w-full items-center pl-4 {{ active(['user.dashboard'], 'border-l-2 border-gray-800') }}">
        <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('user.dashboard')}}">
            <i class="fas fa-tv opacity-75 mr-2 text-sm"></i> {{ __('Dashboard') }}
        </a>
    </li>
    <li class=" w-full items-center pl-4 {{ active(['user.channels', 'user.channels.*'], 'border-l-2 border-gray-800') }}">
        <a class="text-gray-800 hover:text-red-600 text-xs uppercase py-3 font-bold block" href="{{ route('user.channels')}}">
            <i class="far fa-list-music opacity-75 mr-2 text-sm"></i> {{ __('Channels') }}
        </a>
    </li>
</ul>
