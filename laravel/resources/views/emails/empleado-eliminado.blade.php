<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>
    body{
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    table{
        text-align: center;
    }
    h1{
        font-family: 'Satisfy', cursive;
        color: rgb(255, 96, 0);
    }
    h2{
        color: black;
    }
    h3{
        color:black;
    }
    </style>
</head>
<body style="text-align: center">
    <div>
        <h1>¡Hola {{ $user->name.' '.$user->first_name}}!</h1>
        <h2>Lamentamos tu partida de:</h2>
        <img src="{{ $message->embed('img/logo_oscuro.png')}}" alt="">
        <h3>Esperamos Volverte a ver muy pronto :(</h3>
    </div>
</body>
</html>

