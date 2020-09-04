<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h4>Bonjour,</h4>
    @if($data != false)
    <h4>Rendez-vous avec {{$data['civilite']}} <strong style="color: blue"> {{$data['prenom']}} {{$data['nom']}}</strong> </h4>
    <ul>
        <li><strong>Date :</strong> {{ $data['date'] }} </li>
        <li><strong>Heure :</strong> {{ $data['heure'] }} </li>
        <li><strong>Service :</strong> {{ $data['service'] }} </li>
        <li><strong>Durée :</strong> 1 heure</p>
    </ul>
    @else
    <h4>Votre rendez-vous à été annulé ! </h4>
    @endif
    <p>Cordialement.</p>

    <hr>
    <span>
        <p>CONSULTING FORMATION</p> 
        <p>26 RUE DES RIGOLES</p> 
        <p>75020 PARIS 20</p> 
        <p>+33 6 60 11 12 23</p>
        <p>atmane77@yahoo.fr</p>
    </span>
    
</body>
</html>