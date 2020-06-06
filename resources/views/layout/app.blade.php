<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
        <script src="https://kit.fontawesome.com/b3f3b5efe7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <div id="app" class="" style="background: #f0f0f3; height: 100vh; padding: 30px 30px 60px; ">
            <div class="main elevate">
                <div class="header">@include('partial.header')</div>
                <div class="content">
                    <div class="sidebar">
                        <h2 class="font-weight-bold mb-3">employee</h2>
                        @include('partial.sidebar')
                    </div>
                    <div class="dynamic">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
