@extends('layouts.backend')

@section('content')
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        {{ __('Settings') }}
    </h2>

    <div class="py-12">
        <div class="flex flex-row flex-wrap">
            <div class="w-full md:w-1/3">
                <div class="px-4 md:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Mail Settings') }}</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-600">{{ __("Please be careful when you are configuring SMTP. For incorrect configuration you will get error at the time of new registration, sending newsletter.") }}</p>
                </div>
            </div>
            <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                @livewire('backend.settings.mail-settings')
            </div>
        </div>
        <div class="py-8">
            <div class="border-t border-transparent md:border-gray-200"></div>
        </div>
    </div>
@endsection
