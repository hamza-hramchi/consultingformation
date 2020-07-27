<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h4>Bonjour,</h4>
    <h4>Rendez-vous avec {{$data['civilite']}} <strong style="color: blue"> {{$data['prenom']}} {{$data['nom']}}</strong> </h4>
    <ul>
        <li><strong>Date :</strong> {{ $data['date'] }} </li>
        <li><strong>Heure :</strong> {{ $data['heure'] }} </li>
        <li><strong>Service :</strong> {{ $data['service'] }} </li>
        <li><strong>Durée :</strong> 1 heure</p>
    </ul>
    <p>Cordialement.</p>

    <hr>
    <span>
        <p>CONSULTING FORMATION</p> 
        <p>26 RUE DES RIGOLES</p> 
        <p>75020 PARIS 20</p> 
        <p>+33 7 51 32 47 11</p>
        <p>atmane77@yahoo.fr</p>
    </span>
    
</body>
</html>