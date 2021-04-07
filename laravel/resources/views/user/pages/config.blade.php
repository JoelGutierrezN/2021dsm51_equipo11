@extends('user.layouts.master')

@section('titulo', 'Premium')

@section('contenido')
<body class="fondo-body">
    <main class="text-center fondo-blanco contenedor-perfil">
        <div class="navegacion-izquierda">
            <div class="text-center">
                <img src="{{ route('userImg',['filename' => $user->img]) }}" alt="imagen usuario" class="foto-perfil">
                <p class="FS-2rem titulo text-black">{{$user->name.' '. $user->first_name}}</p>
                <p class="FS-2rem titulo-3">{{$user->rank}}</p>
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
        <div class="contenido-derecho fondo-negro">
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
        <img src="../img/logo.png" alt="logo">
        <h1 class="titulo-3 texto-naranja-secundario">Configuracion de Mi Cuenta</h1>
        <hr class="texto-naranja-secundario">        
        <form action="{{ route('userEdit') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div>
                <div>
                    <h1 class="text-yellow">Foto de Perfil</h1>
                    <img src="{{ route('userImg', [ 'filename' => $user->img ] )}}" alt="foto perfil" class="foto-perfil">
                    <p class="text-orange titulo-4">{{ $usuario['session_rank'] }}</p>
                    <input type="file" name="img" id="img" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                    <label for="img"> <strong>Subir Foto</strong> </label>
                </div>  
            </div>
            <hr class="texto-naranja-secundario">
            <div>
                <div>
                    <label for="name"> Nombre: </label>
                    <input type="text" name="name" id="name" class="name" value="{{$DatosUsuario->name}}">

                    <label for="first_name"> Apellido: </label>
                    <input type="text" name="first_name" id="first_name" class="first_name" value="{{$DatosUsuario->first_name}}">
                </div>
            </div>
            <div>
                <div>
                    <label for="email"> Correo: </label>
                    <input type="text" name="email" id="email" class="email" value="{{$DatosUsuario->email}}">
                </div>
                <div>
                    <label for="cellphone"> Numero Celular: </label>
                    <input type="text" name="cellphone" id="cellphone" class="cellphone" value="{{$DatosUsuario->cellphone}}">
                </div>
                <div>
                    <label for="phone"> Numero Fijo: </label>
                    <input type="text" name="phone" id="phone" class="phone" value="{{$DatosUsuario->phone}}">
                </div>
            </div>
            <hr class="texto-naranja-secundario">
            <div>
                <h1 class="text-yellow">Cambiar Contraseña</h1>
                <div>
                    <label for="password"> Contraseña Actual: </label>
                    <input type="password" name="password" id="password" class="password">
                </div>
                <div>
                    <label for="new_password"> Nueva Contraseña: </label>
                    <input type="password" name="new_password" id="new_password" class="new_password">
                </div>
                <div>
                    <label for="confirm_password"> Confirmar Nueva Contraseña: </label>
                    <input type="password" name="confirm_password" id="confirm_password" class="confirm_password">
                </div>
            </div>

            <br><br>

            <div>
                <input type="submit" value="Guardar Cambios" class="boton boton-naranja">
            </div>
        </form>
        </div>
    </main>

    <script type="text/javascript" src="{{ asset('js/js.js') }}"></script>
</body>
@stop
