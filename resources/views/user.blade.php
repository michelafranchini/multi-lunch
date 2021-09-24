@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5">Ciao {{$user->name}}!</h1>
    <div class="container d-flex">
        
        <aside class="">
            <div class="text_left text-center mt-5 ">
                <p class="mb-5">Ti piacerebbe provare qualche nuovo ristorante con i tuoi colleghi?</p>
                <p class="mb-3">O vuoi semplicemente portarli nel tuo ristorante preferito?</p>
                <a href="{{route('addRestaurant')}}" class="btn btn-orange my-5"> Aggiungi il Ristorante</a>
            </div>
        </aside>
        <div class="ml-5">
            <h2 class="mb-5">I ristoranti presenti in lista</h2>
            <div class="d-flex justify-content-between width flex-wrap">
            @foreach ($restaurants as $item)
                <div class="card bg-light mb-3 rest_card">
                    <div class="card-header">{{$item->name}}</div>
                    <div class="card-body">
                    <h5 class="card-title">{{$item->address}}</h5>
                    <p class="card-text">{{$item->city}}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection