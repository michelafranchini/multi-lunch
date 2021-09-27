<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use App\Config; 
use App\Mail\SendMail; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    private $validationArray = [ 
        'n' => 'required', 
        'date' => 'required', 
        'start' => 'required', 
        'end' => 'required', 
    ];

    public function index()

    {
        $admin = Auth::user(); 
        $restaurants = Restaurant::all(); 
        $users = User::all(); 
        $config = Config::all();

        return view('admin', compact('restaurants', 'users', 'admin','config'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::all();

        return view('config', compact('config'));

    } 

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $request->validate($this->validationArray); 

        $config = new Config(); 

        $config->fill($data); 

        $config->save(); 

        return redirect()->route('admin', $config->id); 

    }

    public function edit()
    {
        $config = Config::all();

        return view('editconfig', compact('config'));

    } 

    public function update(Request $request)
    {
        $data = $request->all(); 
        $config = Config::where('id', 9)->first(); 
        $request->validate($this->validationArray);  
        $config->update($data); 

        return redirect()->route('admin'); 

    }

    public function getLunch() {
        
        $users = User::all();
        $configs = Config::all();
        
        foreach ($configs as $config) {
            $configN = $config->n;
            $configStart = $config->start;  
            $configEnd = $config->end; 
            $configDate = $config->date; 
        }

        //dd($configStart); 
        $shuffledUser = $users->shuffle()->toArray();
        
        //$group = floor(count($shuffledUser)/$data['n']); 

        $utenti = User::inRandomOrder()->limit($configN)->get(); 
        //$utenti = User::inRandomOrder()->limit($configs['n'])->get();

        $divisions = array_chunk($shuffledUser, $configN);
        //$divisions = array_chunk($shuffledUser, $configs->n); 

        $restaurants = Restaurant::all();
        $shuffledRest = $restaurants->shuffle()->toArray();

        $rest = array_slice($shuffledRest, 0, count($divisions)); 

        //dd($divisions); 
    
        $events = []; 

        for($i = 0; $i < count($divisions); $i++) {

            $event = [
                'partecipanti' => $divisions[$i],
                'ristorante' => $rest[$i]['name'], 
                'inizio' => $configStart, 
                'fine' => $configEnd, 
                'giorno' => $configDate
            ]; 
            
            foreach($event['partecipanti'] as $partecipante) {
                $siglePerson = $partecipante['name']; 
            }

            $events[] = $event; 

 
        }
        
        //dd($events); 
    
        return view('groups', compact('divisions', 'shuffledRest', 'events')); 
	
    }

    // public function sendMail(SendMail $sendMail) {
    //     $sendMail->call(function(){
    //         getLunch(); 
    //     })->weeklyOn(1, '8:00');	
    // }
            
}
