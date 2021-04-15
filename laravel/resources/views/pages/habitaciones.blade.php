@extends('layouts.master')

@section('titulo', 'Reservaciones')

@section('contenido')
<body class="fondo-body">
<h3 class="anuncio titulo">Tambien Podemos Recolectar tu Mascota a Domicilio</h3>
<main class="container reservaciones">
    <div class="habitaciones">


        <!-- Habitaciones -->
        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!--  Habitacion Sencilla-->
            <img src="{{ route('roomImg', ['filename' => 'room.png']) }}" alt="img/rooms/room.png">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">Habitacion Sencilla</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">Habitacion Sencilla con lo Esencial para el Descanso de tu Mascota</textarea>
                <p class="precio">$150</p>
                <div>
                    <a href="{{ route('reservarVU', ['date' => 1]) }}" class="boton-small boton-naranja">Rentar Ahora</a>
                </div>
            </div>
        </div>


        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!-- Habitacion Basica -->
            <img src="{{ route('roomImg', ['filename' => 'room.png']) }}" alt="img/rooms/room.png">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">Habitacion Basica</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">Habitacion Basica con lo Basico para el Descanso y Distraccion de tu Mascota</textarea>
                <p class="precio">$250</p>
                <div>
                    <a href="{{ route('reservarVU', ['date' => 1]) }}" class="boton-small boton-naranja">Rentar Ahora</a>
                </div>
            </div>
        </div>



        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!-- Habitacion Grande -->
            <img src="{{ route('roomImg', ['filename' => 'room.png']) }}" alt="img/rooms/room.png">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">Habitacion Grande</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">Habitacion Grande Esencial para Razas Grandes o Inquietas</textarea>
                <p class="precio">$300</p>
                <div>
                    <a href="{{ route('reservarVU', ['date' => 1]) }}" class="boton-small boton-naranja">Rentar Ahora</a>
                </div>
            </div>
        </div>




        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!-- Habitacion Doble -->
            <img src="{{ route('roomImg', ['filename' => 'room.png']) }}" alt="img/rooms/room.png">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">Habitacion Doble</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">Habitacion Doble, Apta para cualquier Raza, Disponible para 2 a 4 Mascotas</textarea>
                <p class="precio">$450</p>
                <div>
                    <a href="{{ route('reservarVU', ['date' => 1]) }}" class="boton-small boton-naranja">Rentar Ahora</a>
                </div>
            </div>
        </div>




        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!-- Habitacion -->
            <img src="{{ route('roomImg', ['filename' => 'room.png']) }}" alt="img/rooms/room.png">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">Suite de SafetyDogs</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">Habitacion lujosa, con todas las necesidades, ademas de que puede alojar a un maximo de 10 mascotas</textarea>
                <p class="precio">$600</p>
                <div>
                    <a href="{{ route('reservarVU', ['date' => 1]) }}" class="boton-small boton-naranja">Rentar Ahora</a>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
