<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('css')
</head>

<body>
    @yield('main_menu', View::make('layouts.main_menu'))

    @yield('content')

    <script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
