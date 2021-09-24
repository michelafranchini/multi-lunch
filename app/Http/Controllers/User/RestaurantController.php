<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant; 
use App\User; 

class RestaurantController extends Controller
{
    // private $validationArray = [
    //     'name' => 'required|max:50',
    //     'city' => 'required', 
    //     'address' => 'required'
    // ];

    // public function create() {
    //     return view('users.addRestaurant'); 
    // }

    // public function store(Request $request) {
    //     $data = $request->all();
    //     //dd($data); 
    //     $request->validate($this->validationArray); 
    //     $restaurant = new Restaurant();


    //     $restaurant->fill($data); 
         
    //     $restaurant->save(); 

    //     if (array_key_exists('users', $data)) {
    //         $restaurant->users()->attach($data['users']);
    //     }

    //     return redirect()
    //         ->route('users.home', $restaurant->id)
    //         ->with('message', 'Ristorante aggiunto correttamente'); 
    // }

}
