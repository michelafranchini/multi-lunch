@extends('layouts.app')

@section('content')
<div class="container">
    <div>
       
        
        <div>
            
            @foreach ($divisions as $group)
            <div style="border: 1px solid black">
                {{-- <small>{{$shuffledRest[$randomRest]['name']}}</small> --}}
                
                @foreach($group as $key => $value) 
                <h4>{{$value['name']}}</h4>
                
                @endforeach
                
                {{-- <small>{{$rest['name']}}</small> --}}
                </div>
            @endforeach 
        </div>

        <div>
            @foreach ($shuffledRest as $rest => $value)
                {{$value['name']}} <br>
            @endforeach
        </div> 

    </div>
</div>
@endsection