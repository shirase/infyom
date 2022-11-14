<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    @stack('meta')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <div id="body_scroll">
        <div id="body_wrap">
            @yield('main_menu', View::make('layouts.main_menu'))

            @yield('breadcrumb', View::make('layouts.breadcrumbs'))

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
