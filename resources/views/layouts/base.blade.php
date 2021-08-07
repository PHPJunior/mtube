<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        @yield('meta')

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        <link rel="stylesheet" href="https://releases.transloadit.com/uppy/v1.30.0/uppy.min.css">


        @livewireStyles

        <style>
        </style>

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- Load Uppy JS bundle. -->
        <script src="https://releases.transloadit.com/uppy/v1.30.0/uppy.min.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@clappr/hlsjs-playback@latest/dist/hlsjs-playback.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/clappr/clappr-level-selector-plugin@latest/dist/level-selector.min.js"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            input:checked.autoplay  ~ .dot {
                transform: translateX(100%);
            }
            input:checked.autoplay  ~ .switch-bg {
                background: #2563EB;
            }
        </style>

    </head>

    <body class="font-jetbrains">
        @yield('body')

        @livewireScripts
        @livewire('livewire-ui-modal')
        @livewireUIScripts

        @yield('scripts')
    </body>
</html>
