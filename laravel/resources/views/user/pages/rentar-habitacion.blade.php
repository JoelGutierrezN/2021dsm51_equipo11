@extends('user.layouts.master')

@section('titulo', 'Reservaciones')

@section('contenido')
<body class="fondo-body">
<h3 class="anuncio titulo">Tambien Podemos Recolectar tu Mascota a Domicilio</h3>
<main class="container reservaciones">
    <div class="habitaciones">
        <form action="" method="post">
        @csrf
            <fieldset>Reservar <span>{{$habitacion->name}}</span></fieldset>
            <div class="agregar-servicios">

                <div class="agregar-mascotas-rentar">
                    @foreach($pets as $pet)
                    <div class="contenedor-mascota">
                        <input type="checkbox" name="pets[]" value="$pet->id">
                        <img src="{{ route('petImg',[ 'filename' => $pet->img]) }}" alt="{{$pet->img}}">
                        <div>{{$pet->name}}</div>
                        <div>{{$pet->race}}</div>
                        <textarea>{{$pet->description}}</textarea>
                        <button class=""><span>Agregar a </span> {{$pet->name}}</button>
                    </div>
                    @endforeach
                </div>

                <!-- <div class="servicios-rentar">
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
                </div> -->

            </div>
        </form>
    </div>
</main>
    <script src="{{ asset('js/reservar.js') }}"></script>
</body>
@stop
