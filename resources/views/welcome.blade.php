<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Multi Lunch</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <h1>Benvenuto su MULTI Lunch</h1>
            </div>
        </div>
    </body>
</html> --}}

@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container home_page text-center">
            <img src="{{asset('img/illustration.svg')}}" alt="" class="illustration">
            <h1>Vuoi scoprire nuovi ristoranti e conoscere meglio i tuoi colleghi?</h1>
            <h3>MULTILunch è il software che fa per te!</h3>
            <a
            class="btn btn-orange my-5"
            href="/register"
            >Registrati ora</a>
        </div>
    </div>
@endsection
