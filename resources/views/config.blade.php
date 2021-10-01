@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form action="{{route('config.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group mb-5">
                <label for="n">Quante persone vuoi che ci siano in un gruppo?</label>
                <input type="number" class="form-control" id="n" placeholder="Inserisci il numero" value="{{old('n')}}" name="n">
            </div>
            <div class="form-group mb-5">
                <label for="date">Scegli il giorno in cui andare a pranzo</label>
                 <input class="form-control" type="date" value="date" id="date" name="date">      
            </div>

            <div class="form-group d-flex mb-5">
                <div class="mr-2">
                    <label for="start">Inizio pausa pranzo</label>
                    <input type="time" id="start" name="start">
                </div>

                <div>
                    <label for="end">Fine pausa pranzo</label>
                    <input type="time" id="end" name="end">
                </div>
            </div>
            @if (count($config) > 0)
                @foreach ($config as $item)
                    <a href="{{route('editconfig', $item['id'])}}" class="btn btn-orange my-3">Modifica qui la configurazione</a>
                @endforeach
            @else
                <button type="submit" class="btn btn-orange" value="Submit">Invia</button>
            @endif
        </form>
    </div>

    

</div>
@endsection