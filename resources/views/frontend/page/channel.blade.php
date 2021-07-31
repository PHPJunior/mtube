@extends('layouts.app')

@section('title')
    {{ $channel->name }}
@endsection

@section('meta')
    <x-social-meta
        card="summary_large_image"
        type="website"
        title="{{ $channel->name }}"
        description="{{ $channel->description }}"
        url="{{ url()->current() }}"
        image="{{ \Illuminate\Support\Facades\Storage::disk($channel->disk)->url($channel->banner_image) }}"
    />
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="pt-16 px-4 sm:px-6 lg:px-8">
            <div class="card border w-full relative flex flex-col mx-auto mb-5">
                <img class="max-h-80 w-full object-contain md:object-scale-down" src="{{ \Illuminate\Support\Facades\Storage::disk($channel->disk)->url($channel->banner_image) }}" alt="" />
                <div class="flex p-1 md:p-6 border-t justify-between items-center">
                    <div>
                        @livewire('frontend.components.channel-profile', ['channel_id' => $channel->id])
                    </div>
                    <div>
                        @guest
                            <a href="{{ route('login') }}" class="w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                {{ __('Subscribe') }}
                            </a>
                        @endguest

                        @auth
                            @if(auth()->user()->id == $channel->owner->id)
                                @livewire('frontend.components.channel-owner-button', ['channel_id' => $channel->id])
                            @else
                                @livewire('frontend.components.subscribe-button', ['channel_id' => $channel->id])
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            @livewire('frontend.video.channel-video', ['channel_id' => $channel->id])
        </div>
    </div>
@endsection
