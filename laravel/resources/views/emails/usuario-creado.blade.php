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
        <h1>¡Bienvenido {{ $user->name.' '.$user->first_name}}!</h1>
        <h2>Un administrador te registro como usuario de:</h2>
        <img src="{{ $message->embed('img/logo_oscuro.png')}}" alt="">
        <h3>A continuacion tus datos de ingreso:</h3>
        <h3>Correo: {{$user->email}}</h3>
        <h3>Contraseña: {{$user->password}} <br> No Olvides Cambiar tu contraseña al Ingresar <br>http://dsm.safetydogs.online/login<br> Si este correo no es para ti envianos un correo a:<br>support@safetydogs.online</h3>  
    </div>
</body>
</html>

