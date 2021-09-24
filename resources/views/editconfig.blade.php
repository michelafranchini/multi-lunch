@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form action="{{route('editconfig.update', 9)}}" method="POST">
            @csrf
            @method('PATCH')
            <h2>Modifica i tuoi parametri</h2>
            <div class="form-group">
                <label for="n">Quante persone vuoi che ci siano in un gruppo?</label>
                <input type="number" class="form-control" id="n" placeholder="Inserisci il numero" value="" name="n">
            </div>
            <div class="form-group row">
                <label for="date" class="col-2 col-form-label">Scegli il giorno in cui andare a pranzo</label>
                <div class="col-4">
                  <input class="form-control" type="date" value="date" id="date" name="date">
                </div>
            </div>

            <div class="form-group">
                <label for="start">Inizio pausa pranzo</label>
                <input type="time" id="start" name="start">
                
                <label for="end">Fine pausa pranzo</label>
                <input type="time" id="end" name="end">
            </div>
            <button type="submit" class="btn btn-orange">Modifica</button>
        </form>
    </div>

    

</div>
@endsection