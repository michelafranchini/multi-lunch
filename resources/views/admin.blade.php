@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5">Ciao SUPERADMIN {{$admin->name}}!</h1>
    <div class="d-flex justify-content-around flex-wrap">
        <div class="mb-5">
            <div class="text_left">
                <h2 class="">Gli utenti registrati sono: {{count($users)}}</h2>
            </div>
        </div>
        <div class="mb-5">
            <h2 class="">I ristoranti presenti in lista sono: {{count($restaurants)}}</h2>
        </div>
    </div>
    <div class="text-center">
        <a href="{{route('config')}}" class="btn btn-orange">Configurazione</a>
    </div>

    <div class="mt-5 container d-flex justify-content-around flex-wrap">

        <div>
            <h4>PANORAMICA UTENTI</h4>
            <ul>
                @foreach ($users as $user)
                    <li>{{$user['name']}}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4>PANORAMICA RISTORANTI</h4>
            <ul>
                @foreach ($restaurants as $rest)
                    <li>{{$rest['name']}}</li>
                @endforeach
            </ul>
        </div>

    </div>

    

</div>
@endsection