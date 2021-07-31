@extends('layouts.backend')

@section('content')
    <div class="flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{ __('Channel Management') }}
        </h2>
    </div>
    <div class="mt-6">
        @livewire('backend.channel.table.channels-table')
    </div>
@endsection
