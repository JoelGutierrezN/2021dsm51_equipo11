@extends('user.layouts.master')

@section('titulo', 'Reservaciones')

@section('contenido')
<body class="fondo-body">
<main class="contenedor-reservar">

    
    <div class="tipos">
        <div class="contenedor-botones-fechas">
            <h1 class="titulo text-orange">Dias disponibles para Reservar</h1>
            <a href="{{ route('reservarVU', ['date' => 1] )}}" class="btn-fecha" id="today"></a>
            <a href="{{ route('reservarVU', ['date' => 2] )}}" class="btn-fecha" id="tomorrow"></a>
            <a href="{{ route('reservarVU', ['date' => 3] )}}" class="btn-fecha" id="afterTomorrow"></a>
        </div>
    </div>

    
    <div class="map">
        <div class="parte-frontal">
            <div class="edificio1">
                <div class="titulo-edificio">
                    <div class="FS-1-4rem FW-600 titulo text-white">Habitaciones <span>Sencillas</span></div>
                </div>
                <div class="habitaciones-edificio">
                @foreach($estadoHabitaciones as $habitacion)
                    @if($habitacion['rank'] == 1)
                        @if($habitacion ['active'] == 1)
                            <a href="{{ route('detalle.habitacion',['id' => $habitacion['id'] ]) }}" class="habitacion-disponible link-blanco">Disponible</a>
                        @else
                            <div class="habitacion-no-disponible link-blanco">No Disponible</div>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>

            <div class="edificio2">
                <div id="area-actividades" class="titulo FS-2rem text-white">Area de Actividades</div>
            </div>

            <div class="edificio1">
                <div class="titulo-edificio">
                    <div class="FS-1-4rem FW-600 titulo text-white">Habitaciones <span>Basicas</span></div>
                </div>
                <div class="habitaciones-edificio">
                @foreach($estadoHabitaciones as $habitacion)
                    @if($habitacion['rank'] == 2)
                        @if($habitacion ['active'] == 1)
                            <a href="{{ route('detalle.habitacion',['id' => $habitacion['id'] ]) }}" class="habitacion-disponible link-blanco">Disponible</a>
                        @else
                            <div class="habitacion-no-disponible link-blanco">No Disponible</div>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>

        </div>
        <div class="parte-trasera">
            <div class="edificio1">
                <div class="titulo-edificio">
                    <div class="FS-1-4rem FW-600 titulo text-white">Habitaciones <span>Grandes</span></div>
                </div>
                <div class="habitaciones-edificio">
                @foreach($estadoHabitaciones as $habitacion)
                    @if($habitacion['rank'] == 3)
                        @if($habitacion ['active'] == 1)
                            <a href="{{ route('detalle.habitacion',['id' => $habitacion['id'] ]) }}" class="habitacion-disponible link-blanco">Disponible</a>
                        @else
                            <div class="habitacion-no-disponible link-blanco">No Disponible</div>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>

            <div class="edificio3">
                <div class="titulo-edificio">
                    <div class="FS-1-4rem FW-600 titulo text-white">Habitaciones <span>Dobles</span></div>
                </div>
                <div class="habitaciones-edificio-small">
                @foreach($estadoHabitaciones as $habitacion)
                    @if($habitacion['rank'] == 4)
                        @if($habitacion ['active'] == 1)
                            <a href="{{ route('detalle.habitacion',['id' => $habitacion['id'] ]) }}" class="habitacion-disponible link-blanco">Disponible</a>
                        @else
                            <div class="habitacion-no-disponible link-blanco">No Disponible</div>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>

           <div class="edificio1">
                <div class="titulo-edificio">
                    <div class="FS-1-4rem FW-600 titulo text-white">Suites de <span>SafetyDogs</span></div>
                </div>
                <div class="habitaciones-edificio">
                @foreach($estadoHabitaciones as $habitacion)
                    @if($habitacion['rank'] == 5)
                        @if($habitacion ['active'] == 1)
                            <a href="{{ route('detalle.habitacion',['id' => $habitacion['id'] ]) }}" class="habitacion-disponible link-blanco">Disponible</a>
                        @else
                            <div class="habitacion-no-disponible link-blanco">No Disponible</div>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/reservar.js') }}"></script>
</main>
</body>
@stop



