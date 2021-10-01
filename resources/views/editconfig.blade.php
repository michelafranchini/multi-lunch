@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form action="{{route('editconfig.update', 1)}}" method="POST">
            @csrf
            @method('PATCH')
            <h2>Modifica la tua configurazione</h2>
            <div class="form-group mb-5 mt-5">
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
            <button type="submit" class="btn btn-orange">Modifica</button>
        </form>
    </div>

    

</div>
@endsection