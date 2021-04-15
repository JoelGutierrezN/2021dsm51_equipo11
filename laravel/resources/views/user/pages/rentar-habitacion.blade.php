@extends('user.layouts.master')

@section('titulo', 'Reservaciones')

@section('contenido')
<body class="fondo-body">
<h3 class="anuncio titulo">Tambien Podemos Recolectar tu Mascota a Domicilio</h3>
<main class="container reservaciones">
    <div class="habitaciones">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if( session('message') )
            <div class="alert alert-success FS-2rem">
                {{ session('message') }}
            </div>
        @endif

        @if( session('error') )
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('reservar.confirmacion') }}" method="post" class="text-center">
        @csrf
            <fieldset class="text-center FS-2rem text-orange">Reservar <span>{{$habitacion->name}}</span></fieldset>
            <div class="agregar-servicios">
                <input type="hidden" name="room_id" value="{{$habitacion->id}}">
                <div class="alert bg-primary text-white text-center FS-2rem" id="fechas">
                    Elegir Fecha a Rentar
                </div>
                
                <div class="agregar-fechas-rentar container text-center" id="contenedor-fechas">
                    <div class="btn-group btn-group-toggle row" data-toggle="buttons">
                        <label class="btn btn-lg btn-warning FS-1-4rem col text-dark FW-900" style="width: 90%">
                            <input name="dates[]" id="hoy" type="checkbox" value="" autocomplete="off" data-cost="{{$habitacion->cost}}"><p id="today"></p>
                        </label>

                        <label class="btn btn-lg btn-warning FS-1-4rem col text-dark FW-900" style="width: 90%">
                            <input name="dates[]" id="mañana" type="checkbox" value="" autocomplete="off" data-cost="{{$habitacion->cost}}"><p id="tomorrow"></p>
                        </label>

                        <label class="btn btn-lg btn-warning FS-1-4rem col text-dark FW-900" style="width: 90%">
                            <input name="dates[]" id="pasado" type="checkbox" value="" autocomplete="off" data-cost="{{$habitacion->cost}}"><p id="afterTomorrow"></p>
                        </label>
                    </div>
                </div>

                <div class="alert bg-primary text-white text-center FS-2rem" id="mascotas">
                    Mascotas
                </div>

                <div class="agregar-mascotas-rentar" id="contenedor-mascotas">
                    @if(count($pets) == 0)
                        No hay mascotas
                    @endif
                    @foreach($pets as $pet)
                    <div class="contenedor-mascota card bg-light">
                        <img src="{{ route('petImg',[ 'filename' => $pet->img]) }}" alt="{{$pet->img}}">
                        <div class="titulo">Nombre: {{$pet->name}}</div>
                        <div class="titulo">Raza: {{$pet->race}}</div>
                        <textarea class="resume">{{$pet->description}}</textarea>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-lg text-white btn-success FS-1-4rem" style="width: 90%">
                                <input name="pets[]" type="checkbox" value="{{ $pet->id }}" autocomplete="off" data-name="{{$pet->name}}"> Agregar/Quitar a <span class="texto-naranja-secundario titulo">{{$pet->name}}</span>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="alert bg-primary text-white text-center FS-2rem" id="servicios">
                    Servicios
                </div>

                <div class="servicios-rentar" id="contenedor-servicios">
                    @foreach($servicios as $servicio)
                        @if( ($servicio->premium) == 0 )
                                <div class="card bg-light">
                                    <img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="service-img">
                                    <hr>
                                    <div class="text-white titulo fondo-vino">{{ $servicio->name }}</div>
                                    <textarea id="resume" class="resume-servicio" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                                    <hr>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-warning FS-1-4rem btn-large agregar-servicio" style="width: 90%">
                                            <input name="services[]" type="checkbox" value="{{ $servicio->id }}" class="services" autocomplete="off" data-name="{{$servicio->name}}" data-cost="{{$servicio->cost}}"> Agregar/Quitar <span class="texto-naranja-secundario titulo">Por ${{$servicio->cost}}</span>
                                        </label>
                                    </div>
                                </div>
                            @else
                                @if($user->rank == "Premium" || $user->rank == "Admin" || $user->rank == "Empleado")
                                <div class="card bg-light">
                                    <img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="service-img">
                                    <hr>
                                    <div class="text-white titulo fondo-negro">{{ $servicio->name }}</div>
                                    <textarea id="resume" class="resume-servicio" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                                    <hr>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-lg text-white btn-dark FS-1-4rem agregar-servicio" style="width: 90%">
                                            <input name="services[]" type="checkbox" value="{{ $servicio->id }}" class="services" autocomplete="off" data-name="{{$servicio->name}}" data-cost="0"> Gratis con: <span class="texto-naranja-secundario titulo">Premium</span>
                                        </label>
                                    </div>
                                </div>
                                @endif
                        @endif
                    @endforeach
                </div>

                <div class="alert bg-primary text-white text-center FS-2rem" id="direcciones">
                    Servicio a Domicilio
                </div>
                
                <div id="contenedor-direcciones">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-lg text-white btn-dark FS-1-4rem agregar-servicio" style="width: 90%">
                            <input name="homeservice" type="checkbox" value="1"  autocomplete="off"> Quiero: <span class="texto-naranja-secundario titulo">Servicio a Domicilio</span>
                        </label>
                    </div>

                    <div>
                        <select name="address_id" class="form-control FS-1-4rem" id="selc_direccion">
                            <option value="0" selected disabled>--Seleccionar--</option>
                            @foreach($direcciones as $direccion)
                            <option class="form-control FS-1-4rem" value="{{$direccion->id}}">{{$direccion->street.' '.$direccion->number.' '.$direccion->number_int.', '.$direccion->suburb.', '.$direccion->country->name.', '. $direccion->state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="alert bg-primary text-white text-center FS-2rem" id="facturacion">
                    Facturacion
                </div>
                <div class="container" id="contenedor-facturacion">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control-lg form-control" name="card" placeholder="Numero de tarjeta Credito/Debito">
                            <input type="text" class="form-control-lg form-control" name="card_date" placeholder="Fecha de Vencimiento">
                            <input type="text" class="form-control-lg form-control" name="cvv" placeholder="CVV">
                            <input type="text" class="form-control-lg form-control" name="owner_name" placeholder="Nombre del Titular de la Tarjeta">

                            <div class="">
                                <div class="fechas"></div>
                                <div class="mascotas"></div>
                                <div class="servicios"></div>
                                <div class="domicilio"></div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="totales">
                                <label for="subtotal">Subtotal:</label>
                                <input type="text" name="subtotal" id="subtotal" class="form-control" readOnly>
                                <label for="IVA">IVA 16%:</label>
                                <input type="text" name="IVA" id="IVA" class="form-control" readOnly>
                                <label for="total">Total:</label>
                                <input type="text" name="total" class="form-control" id="total" readOnly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-lg" id="pagar" value="Pagar">
        </form>
    </div>
</main>
    <script src="{{ asset('js/reservacion.js') }}"></script>
</body>
@stop
