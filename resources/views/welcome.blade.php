
@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid home_page text-center">
            <img src="{{asset('img/illustration.svg')}}" alt="" class="illustration img-fluid">
            <h1 class="my-3">Vuoi scoprire nuovi ristoranti e conoscere meglio i tuoi colleghi?</h1>
            <h3 class="mt-3 mb-2">MULTILunch è il software che fa per te!</h3>
            <a
            class="btn btn-orange mt-2"
            href="/register"
            >Registrati ora</a>
        </div>
    </div>
@endsection
