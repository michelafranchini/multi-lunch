@extends('layouts.app')

@section('content')
<div class="container">
    <div>

        
        @foreach ($events as $event)
            <div class="card" style="border: 1px solid black">
                <h5 class="card-title">RISTORANTE: {{$event['ristorante']}}</h5>
                <p>ORA INIZIO: {{$event['inizio']}}</p>
                <p>ORA FINE: {{$event['fine']}}</p>
                <p>IL GIORNO: {{$event['giorno']}}</p>
                <ul class="list-group list-group-flush">
                    @foreach ($event['partecipanti'] as $partecipante)
                    <li class="list-group-item">{{$partecipante['name']}}</li>
                    @endforeach
                </ul>

            </div> 
        @endforeach 
            

    </div>
</div>
@endsection