@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5">Ciao SUPERADMIN {{$admin->name}}!</h1>
    <div class="d-flex">
        <aside class="mb-5">
            <div class="text_left">
                <h2 class="">Gli utenti registrati sono: {{count($users)}}</h2>
            </div>
        </aside>
        <div class="mb-5">
            <h2 class="">I ristoranti presenti in lista sono: {{count($restaurants)}}</h2>
        </div>
    </div>
    <div>
        {{-- @dd($config) --}}
        {{-- <a href="{{route('editconfig')}}" class="btn btn-orange">Modifica qui la configurazione</a>    --}}
        
        <a href="{{route('config')}}" class="btn btn-orange">Configurazione</a>
        {{-- <a href="{{route('groups')}}" class="btn btn-orange">Vedi i gruppi</a> --}}
        
    </div>

    

</div>
@endsection