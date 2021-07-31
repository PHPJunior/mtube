@extends('layouts.account')

@section('dashboard')
    @livewire('frontend.channel.view-channel', ['channel_id' => $channel->id ])
@endsection
