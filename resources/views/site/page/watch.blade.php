@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        @livewire('video.watch-video', ['video' => $video])
    </div>
@endsection
