<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $validationArray = [
        'name' => 'required|max:50',
        'city' => 'required', 
        'address' => 'required'
    ]; 

    public function index()
    { 
        $user = Auth::user(); 
        $restaurants = Restaurant::all(); 
        return view('user', compact('restaurants', 'user'));
    }

    public function create() {
        //$user = Auth::user(); 
        return view('addRestaurant'); 
    }

    public function store(Request $request) {
        $data = $request->all();
        //dd($data); 
        $request->validate($this->validationArray); 
        $restaurant = new Restaurant();

        $user_id = Auth::id(); 

        $restaurant->fill($data); 
         
        $restaurant->save(); 

        $restaurant->users()->attach($user_id);
        
        return redirect()
            ->route('user')
            ->with('message', 'Ristorante aggiunto correttamente'); 
    }

    


}
