@extends('layouts.master')

@section('titulo', 'Servicios')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor contenedor-servicios">
        <div class="servicios">
            @foreach($servicios as $servicio)
                
                @if( ($servicio->premium) == 0 )
                    <div class="servicio">
                        <img src="..{{$servicio->img}}" alt="service-img">
                        <hr>
                        <div class="text-white titulo-3 fondo-vino">{{ $servicio->name }}</div>
                        <textarea name="resume-servicio" id="resume" class="resume" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                        <hr>
                        <div class="precio-negro fondo-naranja">${{ $servicio->cost }}</div>
                    </div>
                @endif

            @endforeach
        </div>
    </main>
</body>
@stop
