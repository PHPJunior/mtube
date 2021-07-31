@extends('layouts.backend')

@section('content')
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        {{ __('Dashboard') }}
    </h2>
    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4 mt-6">
        <div class="p-5 bg-white rounded border">
            <div class="text-base text-gray-400 ">{{ __('Total Users') }}</div>
            <div class="flex items-center pt-1">
                <div class="text-2xl font-bold text-gray-900 ">{{ ReadableNumber(\App\Models\Auth\User::all()->count()) }}</div>
            </div>
        </div>

        <div class="p-5 bg-white rounded border">
            <div class="text-base text-gray-400 ">{{ __('Total Channels') }}</div>
            <div class="flex items-center pt-1">
                <div class="text-2xl font-bold text-gray-900 ">{{ ReadableNumber(\App\Models\Channel\Channel::all()->count()) }}</div>
            </div>
        </div>
    </div>
@endsection
