@extends('user.layouts.master')

@section('titulo', 'Servicios')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor contenedor-servicios">
        <div class="servicios">
            @foreach($servicios as $servicio)
                
                @if( ($servicio->premium) == 0 )
                    <div class="servicio">
                        <img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="service-img">
                        <hr>
                        <div class="text-white titulo-3 fondo-vino">{{ $servicio->name }}</div>
                        <textarea name="resume" id="resume" class="resume-servicio" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                        <hr>
                        <div class="precio-negro fondo-naranja">${{ $servicio->cost }}</div>
                    </div>
                @else
                    <div class="servicio-premium">
                        <img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="service-img">
                        <hr>
                        <div class="text-white titulo-3 fondo-negro">{{ $servicio->name }}</div>
                        <textarea name="resume" id="resume" class="resume-servicio" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                        <hr>
                        <div class="text-white fondo-negro FS-1-4rem">Gratis con <span class="texto-naranja-secundario titulo">Premium</span></div>
                    </div>
                @endif

            @endforeach
        </div>
    </main>
</body>
@stop
