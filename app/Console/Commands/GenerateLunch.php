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
                'indirizzo' => $rest[$i]['address'],
                'città' => $rest[$i]['city'],
                'inizio' => $configStart, 
                'fine' => $configEnd, 
                //'giorno' => date("d-m-Y", strtotime($configDate))
                'giorno' => $configDate, 
                //'datetime' => date('Y-m-d h:i:s',strtotime($configDate.$configStart))
            ]; 
            
            
            $events[] = $event; 



            //Mail::to($event['emails'])->send(new SendMail($event)); 
            Mail::send('mail', $event, function($message) use($event)
            { 

                $ics = "invite.ics";
                $title = "Ecco il tuo invito"; 
                $users = implode(", " ,$event['partecipanti']); 
                $date = date("d-m-Y", strtotime($event['giorno'])); 
                $restaurant = $event['ristorante'];
                $address = $event['indirizzo']; 
                $city = $event['città']; 
                $address = $event['indirizzo']; 
                $city = $event['città']; 
                $start = $event['inizio'];
                $end = $event['fine'];
                $organizer = "Multi Dialogo";
                $meetingstamp = strtotime($event['giorno'].'UTC');
                $dtstart = gmdate('Ymd\THis\Z', $meetingstamp);  //FUNZIONA SOLO CON DATA
                
                
               

                // ICS
                $mail[0]  = "BEGIN:VCALENDAR";
                $mail[1] = "PRODID:-//Google Inc//Google Calendar 70.9054//EN";
                $mail[2] = "VERSION:2.0";
                $mail[3] = "CALSCALE:GREGORIAN";
                $mail[4] = "METHOD:REQUEST";
                $mail[5] = "BEGIN:VEVENT"; 
                $mail[6] = "DTSTART;TZID=Europe/Rome:" . $dtstart;  

                //$mail[7] = "DTEND;TZID=Europe/Berlin:" . $date. 'T'. $dtend. 'Z';
                //$mail[9] = "DTSTAMP;TZID=Europe/Berlin:" . $todaystamp;
                //$mail[8] = "GIORNO" . $date; 
                $mail[10] = "ORGANIZER;" . $organizer;
                $mail[14] = "LOCATION:" . $restaurant . " - " . $address. ", " . $city; 
                $mail[15] = "SEQUENCE:0";
                $mail[16] = "STATUS:CONFIRMED";
                $mail[17] = "SUMMARY:" . $title;
                $mail[18] = "TRANSP:OPAQUE";
                $mail[19] = "END:VEVENT";
                $mail[20] = "END:VCALENDAR";
                
                $mail = implode("\r\n", $mail);
                header("text/calendar");
                file_put_contents($ics, $mail);
                
                $message->subject($title);
                $message->to($event['emails']);
                $message->addPart("
                <div>
                    <h3>RISTORANTE:</h3>
                    <p>$restaurant - $address - $city</p>
                    <h3>DATA:</h3>
                    <p>$date</p>
                    <h3>ORA INIZIO:</h3>
                    <p>$start</p>
                    <h3>ORA FINE:</h3>
                    <p>$end</p>
                    <h3>IL TUO GRUPPO E' FORMATO DA:</h3>
                    <p>$users</p>
                </div>
                ", "text/html");
                $message->attach($ics, array('mime' => 'text/calendar; charset="utf-8"; method=REQUEST'));
            });
            

            
            
            
        }
        
        // $newRest = new Restaurant(); 
        // $newRest->name = "Prova"; 
        // $newRest->address = "Via"; 
        // $newRest->city = "Roma"; 

        // $newRest->save(); 


    }
}
