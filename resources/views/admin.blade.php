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
        <form action="/groups" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="n">Quante persone vuoi che ci siano in un gruppo?</label>
                <input type="number" class="form-control" id="n" placeholder="Inserisci il numero" value="" name="n">
            </div>
            <select class="form-select" aria-label="Default select example" name="day">
                <label for="day">Quale giorno vorresti uscire a pranzo?</label>
                <option selected>Scegli il giorno</option>
                <option name="day" value="lun">Lunedì</option>
                <option name="day" value="mar">Martedì</option>
                <option name="day" value="mer">Mercoledì</option>
                <option name="day" value="gio">Giovedì</option>
                <option name="day" value="ven">Venerdì</option>
            </select>

            <div class="form-group">
                <label for="start">Inizio pausa pranzo</label>
                <input type="time" id="start" name="start">
                
                <label for="end">Fine pausa pranzo</label>
                <input type="time" id="end" name="end">
            </div>
            <button type="submit" class="btn btn-orange">Invia</button>
        </form>
    </div>

    

</div>
@endsection