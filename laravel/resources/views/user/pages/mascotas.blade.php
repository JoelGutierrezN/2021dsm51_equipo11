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
            <div class="seccion-mascotas">
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
                    @if(count($pets) == 0)
                        <div class="no-pets">
                            <img src="{{ asset('img/logo_oscuro.png') }}" alt="">
                            <p>Aun no tienes ningun mejor amigo :(</p>
                        </div>
                        <div>
                            <button class="link-blanco boton boton-naranja btn-agregar-mascota">Agregar Nuevo Mejor Amigo</button>
                        </div>
                    @else
                        <div class="contenedor-mascotas">
                            @foreach($pets as $pet)
                                <div class="mascota">
                                    <p class="FS-1-4rem"><span class="text-orange titulo ">Nombre: </span>{{ $pet->name }}</p>
                                    <img src="{{ route('petImg', ['filename' => $pet->img] ) }}" alt="imagen_mascota">
                                    <p class="FS-1-4rem"><span class="text-orange titulo">Raza: </span>{{ $pet->race }}</p>
                                    <p class="text-orange titulo">Observations: </p>
                                    <textarea name="" class="resume-servicio FS-1-4rem" id="" cols="30" rows="10">{{ $pet->observations }}</textarea>
                                </div>
                            @endforeach
                        </div>
                        <div id="#div">
                            <button class="link-blanco boton boton-naranja btn-agregar-mascota">Agregar Nuevo Mejor Amigo</button>
                        </div>
                    @endif
                
                <div id="form_agregar_mascota">
                    
                    <form action="{{ route('guardar.mascota') }}" class="form-mascota" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="img" id="img" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                    <label for="img"> <strong>Subir Foto</strong> </label>
                        <input type="text" name="name" id="name" placeholder="Nombre">
                        <input type="text" name="race" placeholder="Raza">
                        <textarea name="observations" class="textarea" id="" cols="30" rows="10" placeholder="Observaciones y Cuidados especiales de su mascota, si no los necesita deje el espacio en blanco"></textarea>
                        <input type="submit" value="Agregar" class="boton boton-naranja link-blanco">
                    </form>
                    <button id="cancelar" class="boton boton-naranja link-blanco">Cancelar</button>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/js.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#form_agregar_mascota').hide(0);

            $('.btn-agregar-mascota').click(function (){ 
                $('#form_agregar_mascota').show(0)
            });

            $('#cancelar').click(function (){
                $('#form_agregar_mascota').hide(0);
            });
        });
    </script>
</body>
@stop
