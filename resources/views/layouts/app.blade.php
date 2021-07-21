@extends('layouts.base')

@section('body')
    @include('layouts.includes.navigation')

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    @include('layouts.includes.footer')
@endsection
