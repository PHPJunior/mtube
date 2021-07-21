@extends('layouts.account')

@section('dashboard')
    @livewire('channel.view-channel', ['channel_id' => $channel->id ])
@endsection
