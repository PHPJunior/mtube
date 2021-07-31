@extends('layouts.base')

@section('body')
    @include('layouts.includes.frontend.navigation')

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    @include('layouts.includes.frontend.footer')
@endsection
