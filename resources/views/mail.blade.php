<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Multi lunch</title>
    </head>
    <body>
        <h1>Ecco il tuo Lunch Roulette!</h1>
        <div>
            <h3>RISTORANTE <span>{{$event['ristorante']}}</span></h3>
            <h3>ORA INZIO <span>{{$event['inizio']}}</span></h3>
            <h3>ORA FINE <span>{{$event['fine']}}</span></h3>
            <h3>DATA <span>{{$event['giorno']}}</span></h3>
            <ul>
                @foreach ($event['partecipanti'] as $user)
                    <li>{{$user}}</li>
                @endforeach
            </ul>

        
        </div>
    </body>
</html>