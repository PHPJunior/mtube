@extends('layouts.backend')

@section('content')
    <div class="flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{ __('Admin Management') }}
        </h2>
        <span class="rounded-md shadow-sm">
            <button onclick="Livewire.emit('openModal', 'backend.admin.modal.create-admin')"  type="button" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                {{ __('Add New Admin') }}
            </button>
        </span>
    </div>
    <div class="mt-6">
        @livewire('backend.admin.table.admins-table')
    </div>
@endsection
