@extends('layouts.account')

@section('dashboard')
    @livewire('frontend.channel.live-producer', ['channel_id' => $channel_id, 'video_id' => $video_id ])
@endsection
