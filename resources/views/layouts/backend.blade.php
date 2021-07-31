@extends('layouts.base')

@section('body')
    <div class="flex flex-col md:flex-row">
        @include('layouts.includes.backend.sidebar')
        <div class="w-full md:flex-1">
            <nav class="hidden md:flex justify-between items-center bg-white p-4 border-b h-16">
                <div>
                    <input class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none" type="text" placeholder="Search.."/>
                </div>
                <div>
                    <button class="mx-2 text-gray-700 focus:outline-none"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </div>
            </nav>
            <main>
                <div class="px-8 py-6">
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </main>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@endsection
