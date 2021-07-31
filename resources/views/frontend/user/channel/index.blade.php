@extends('layouts.account')

@section('dashboard')
    <div class="flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{ __('Channels') }}
        </h2>
        <span class="rounded-md shadow-sm">
            <button onclick="Livewire.emit('openModal', 'frontend.channel.modal.create-channel')"  type="button" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                {{ __('Create New Channel') }}
            </button>
        </span>
    </div>

    <div class="mt-6">
        @livewire('frontend.channel.table.channels-table')
    </div>
@endsection
