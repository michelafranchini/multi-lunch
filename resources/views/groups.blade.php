@extends('layouts.app')

@section('content')
<div class="container">
    <div>

        
        @foreach ($events as $event)
            <div class="" style="border: 1px solid black">
                <p>RISTORANTE: {{$event['ristorante']}}</p>
                <p>ORA INIZIO: {{$event['inizio']}}</p>
                <p>ORA FINE: {{$event['fine']}}</p>
                <p>IL GIORNO: {{$event['giorno']}}</p>

                @foreach ($event['partecipanti'] as $partecipante)
                    <p>{{$partecipante['name']}}</p>
                @endforeach
                
            </div> 
           @endforeach 
            

    </div>
</div>
@endsection