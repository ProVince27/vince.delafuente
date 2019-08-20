<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Vincent Dela Fuente') )</title>
    {{-- styles --}}
    <link href="{{ asset("dist/css/vendor.css") }}" rel="stylesheet">
    <link href="{{ asset("dist/css/app.css") }}" rel="stylesheet">
    @stack('plugins.js.top')
    @stack('style')
</head>
<body class = "@yield('body-class','sidebar-mini fixed')" >
    <div id="app" class = "wrapper">
        @yield('content')
    </div>
</body>

{{-- scripts --}}
@routes
@stack('plugins.js')
<script src="{{ asset('dist/js/manifest.js') }}"></script>
<script src="{{ asset('dist/js//dist/js/vendor.js') }}"></script> {{-- // bug on webpack 4 the fix will be applied on webpack 5 --}}
<script src="{{ asset('dist/js//dist/js/app.js') }}"></script> {{-- // bug on webpack 4 the fix will be applied on webpack 5 --}}
@stack('scripts')
</html>