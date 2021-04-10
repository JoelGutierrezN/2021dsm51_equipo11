@extends ('layouts.master')

@section('titulo', 'Registrarse')

@section('contenido')
<body class="fondo-body">
    <div class="contenedor">
        <div class="contenedor_formulario">
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
            <!-- formulario login -->
            <form action="{{ route('registrarUsuario') }}" method="post" class="form-registro">
            @csrf
                <img src="img/logo.png" alt="logo">
                <hr>
                <fieldset class="titulo-3 text-center text-yellow">Crear Cuenta en SafetyDogs</fieldset>
                <div class="form-nombreUsuario">
                    <div>
                        <!-- Name -->
                        <label for="" class="text-orange titulo">Nombre </label>
                        <input type="text" name="name" id="name" class="name" placeholder="Jose Juan">
                    </div>
                    <div>
                        <!-- First Name -->
                        <label for="" class="text-orange titulo">Apellido </label>
                        <input type="text" name="first_name" id="first_name" class="fist_name" placeholder="Garcia">
                    </div>
                </div>
                <div id="cuerpo-form-registro">
                    <div>
                        <!-- Email -->
                        <label for="" class="text-orange titulo">Correo </label>
                        <input type="text" name="email" id="email" class="email" placeholder="ejemplo@correo.com">
                        <!-- Password -->
                        <label for="" class="text-orange titulo">Contraseña </label>
                        <input type="password" name="password" id="password" class="password" placeholder="Contraseña">
                    </div>
                    <div>
                        <!-- Phone -->
                        <label for="" class="text-orange titulo">Tel. Celular </label>
                        <input type="text" name="cellphone" id="cellphone" class="cellphone" placeholder="0000000000">
                        <!-- Cellphone -->
                        <label for="" class="text-orange titulo">Confirmar Contraseña </label>
                        <input type="text" name="cpassword" id="cpassword" class="cpassword" placeholder="Confirmar Contraseña">
                    </div>
                </div>
                <br>
                <!-- Boton  -->
                <input type="submit" name="btn_submit" id="btn_submit-register" class="btn_submit boton boton-naranja" value="Registrar">
            </form>
        </div>
    </div>
</body>
@stop