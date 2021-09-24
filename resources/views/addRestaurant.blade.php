@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('addRestaurant.store')}}" method="POST" class="mt-3" enctype="multipart/form-data"> 

        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="name">Nome del Ristorante</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
            @error('stagename')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">Città in cui si trova il ristorante</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city') }}">
            @error('city')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Indirizzo del Ristorante</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="d-flex justify-content-between align-items-center">
            {{-- <a class="btn" href="">
                Indietro
            </a> --}}
            <button type="submit" class="btn btn-orange my-5">
                Salva
            </button>
        </div>
    </form>
</div>
@endsection