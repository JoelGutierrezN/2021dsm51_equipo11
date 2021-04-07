@extends('user.layouts.master')

@section('titulo', 'Mascotas')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor-micuenta">
        <div class="navegacion-izquierda">
            <div class="text-center">
                <img src="{{ route('userImg',['filename' => $user->img]) }}" alt="imagen usuario" class="foto-perfil">
                <p class="FS-2rem titulo">{{$user->name.' '. $user->first_name}}</p>
                <p class="FS-2rem titulo-3 text-orange">{{$user->rank}}</p>
            </div>
            <hr>
            <div class="navegacion-izquierda-links text-center">
                <a href="{{ route('MiCuentaVU') }}" class="btn-navegacion link-nav-izq">== Mi Cuenta ==</a>
                <a href="{{ route('mascotasVU') }}" class="btn-navegacion link-nav-izq">== Mascotas ==</a>
                <a href="{{ route('direccionesVU') }}" class="btn-navegacion link-nav-izq">== Direcciones ==</a>
                <a href="{{ route('reservacionesVU') }}" class="btn-navegacion link-nav-izq">== Reservaciones ==</a>

                <button href="#" class="link-amarillo btn-cerrar-sesion">Cerrar Sesion</button>
            </div>
        </div>
        <div class="contenido-derecho">
            <div class="seccion-direcciones">
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
                    @if(count($direcciones) == 0)
                        <div class="no-pets">
                            <img src="{{ asset('img/logo_oscuro.png') }}" alt="">
                            <p>Aun no tienes ninguna direccion guardada</p>
                        </div>
                        <div>
                            <button class="link-blanco boton boton-naranja btn-agregar-direccion">Agregar Direccion</button>
                        </div>
                    @else
                        <table class="tabla-direcciones">
                            <thead class="titulo">
                                <th>Calle</th>
                                <th>No. Ext</th>
                                <th>No. Int</th>
                                <th>Colonia</th>
                                <th>Estado</th>
                                <th>Municipio</th>
                            </thead>
                            <tbody>
                            @foreach($direcciones as $direccion)
                                <tr>
                                    <td>{{ $direccion->street }}</td>
                                    <td>{{ $direccion->number }}</td>
                                    <td>{{ $direccion->number_int }}</td>
                                    <td>{{ $direccion->suburb }}</td>
                                    <td>{{ $direccion->state->name }}"</td>
                                    <td>{{ $direccion->country->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        {{$direcciones->links()}}
                        <div id="#div">
                            <button id="agregar" class="link-blanco boton boton-naranja btn-agregar-direccion">Agregar Direccion</button>
                        </div>
                    @endif
                
                <div id="form_agregar_direccion">
                    
                    <form action="{{ route('guardar.direccion') }}" class="form-direccion" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="street" placeholder="Calle">
                        <input type="text" name="number" placeholder="Num. Ext.">
                        <input type="text" name="number_int" placeholder="Num. Int.">
                        <input type="text" name="suburb" placeholder="Colonia">
                        <select name="state_id" id="selc_estados">
                            <option value="0" selected disabled>--Seleccionar Estado--</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                            @endforeach
                        </select>
                        <select name="country_id" id="selc_municipios">
                            <option value="0" selected disabled>--Seleccionar Municipio--</option> 
                        </select>
                        <input type="submit" class="boton boton-naranja link blanco" value="Registrar Direccion">
                    </form>
                    <button id="cancelar" class="boton boton-naranja link-blanco">Cancelar</button>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
    url = 'http://dsm.safetydogs.online';
        $(document).ready(function () {
            $('#form_agregar_direccion').hide(0);

            $('.btn-agregar-direccion').click(function (){ 
                $('#form_agregar_direccion').show(0)
                $('.seccion-direcciones').css('height', 'auto');
                $('#agregar').hide(0);
            });

            $('#cancelar').click(function (){
                $('#form_agregar_direccion').hide(0);
                $('.seccion-direcciones').css('height', '63.5rem');
                $('#agregar').show(0);
            });

            $('#selc_estados').on('change', function() {
                var state_id = $(this).val();
                if ( $.trim( state_id ) != '0' ) {
                    $.ajax({
                        url: url+'/usuario/municipios/'+ state_id,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(municipios){
                            if(municipios){
                                $.each(municipios, function(id, name){
                                    $('#selc_municipios').empty();
                                    $('#selc_municipios').append("<option value='" + id + "'>" + name + "</option>");
                                });
                            }else{
                                $('#selc_municipios').empty();
                                $('#selc_municipios').append("<option value='0' selected disabled>--Selecciona un Estado Antes--</option>");
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
@stop
