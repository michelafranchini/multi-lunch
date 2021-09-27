<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Restaurant;
use App\User;
use App\Config;

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

    }
}
