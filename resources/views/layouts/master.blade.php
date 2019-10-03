<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <div class="position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content container">
                <div class="m-b-md">
                    <h1 class="display-3">Laravel Security</h1>
                </div>

                <div class="links">
                    <a href="{{ route('welcome') }}">Welcome</a>
                    <a href="{{ route('blog') }}">Blog</a>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="container">
                <h2 class="text-center h2">@yield('title')</h2>
                @yield('content')
            </div>

        </div>
    </body>
</html>
