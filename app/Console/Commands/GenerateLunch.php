<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Restaurant;
use App\User;
use App\Config;
use App\Mail\SendMail; 
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail; 

class GenerateLunch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lunch:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea i pranzi casualmente';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = User::all();
        $configs = Config::all();
        
        foreach ($configs as $config) {
            $configN = $config->n;
            $configStart = $config->start;  
            $configEnd = $config->end; 
            $configDate = $config->date; 
        }

        $shuffledUser = $users->shuffle()->toArray();

        $divisions = array_chunk($shuffledUser, $configN);

        $restaurants = Restaurant::all();
        $shuffledRest = $restaurants->shuffle()->toArray();

        $rest = array_slice($shuffledRest, 0, count($divisions)); 

        //dd($divisions); 
    
        $events = []; 

        for($i = 0; $i < count($divisions); $i++) {

            $names = []; 
            $emails = []; 
            foreach($divisions[$i] as $singleUser) {
                $names[] = $singleUser['name']; 
                $emails[] = $singleUser['email'];
            }
            //dd($names); 
            $event = [
                'partecipanti' => $names,
                'emails' => $emails, 
                'ristorante' => $rest[$i]['name'], 
                'inizio' => $configStart, 
                'fine' => $configEnd, 
                'giorno' => date("d-m-Y", strtotime($configDate))
            ]; 
            
            
            $events[] = $event; 

            Mail::to($event['emails'])->send(new SendMail($event)); 
        }

        // $newRest = new Restaurant(); 
        // $newRest->name = "Prova"; 
        // $newRest->address = "Via"; 
        // $newRest->city = "Roma"; 

        // $newRest->save(); 


    }
}
