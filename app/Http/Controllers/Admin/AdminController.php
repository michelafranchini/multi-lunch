<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function index()

    {
        $admin = Auth::user(); 
        $restaurants = Restaurant::all(); 
        $users = User::all(); 

        //$shuffledRest = $restaurants->shuffle();
        //$shuffledUser = $users->shuffle();
        

        return view('admin', compact('restaurants', 'users', 'admin'));
    }

    public function getNumber(Request $request) {
        $data = $request->all();  
        
        $users = User::all();
        $shuffledUser = $users->shuffle()->toArray();
        
        //$group = floor(count($shuffledUser)/$data['n']); 

        $utenti = User::inRandomOrder()->limit($data['n'])->get(); 

        $divisions = array_chunk($shuffledUser, $data['n']);

        foreach ($divisions as $gruppo) {
            $gruppetto = $gruppo; 
        } 

        //dd($divisions); 

        $restaurants = Restaurant::all();
        $shuffledRest = $restaurants->shuffle()->toArray();

        $rest = array_slice($shuffledRest, 0, count($divisions)); 

        $events = []; 
        for($i = 0; $i < count($divisions); $i++) {
            
            $event = [
                'partecipanti' => $divisions[$i],
                'ristorante' => $rest[$i]['name'], 
                'inizio' => $data['start'], 
                'fine' => $data['end'], 
                'giorno' => $data['day']
            ]; 

            $events[] = $event; 
 
        }
        
        dd($events); 
    
        return view('groups', compact('divisions', 'shuffledRest')); 
        
    }
    
}
