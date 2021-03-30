@extends('layouts.master')

@section('titulo', 'Reservaciones')

@section('contenido')
<body class="fondo-body">
<h3 class="anuncio titulo">Tambien Podemos Recolectar tu Mascota a Domicilio</h3>
<main class="container reservaciones">
    <div class="habitaciones">

    @foreach($habitaciones as $habitacion)
        <!-- Habitaciones -->
        <div class="seccion-habitaciones">
            <!-- Habitacion -->
            <img src="{{ route('roomImg', ['filename' => $habitacion->img]) }}" alt="imagen_habitacion">
            <div class="habitacion">
                <h3 class="texto-naranja-secundario titulo">{{ $habitacion->name }}</h3>
                <textarea name="resume" id="resume" class="resume" cols="30" rows="10">{{ $habitacion->resume}}</textarea>
                <p class="precio">${{ $habitacion->cost }}</p>
                <div>
                    <button class="boton-small boton-naranja">Ver más</button>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</main>
@stop
