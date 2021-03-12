@extends ('layouts.master')

@section('titulo', 'Registrarse')

@section('contenido')
<body class="fondo-body">
    <div class="contenedor">
        <div class="contenedor_formulario">
            <!-- formulario login -->
            <form action="{{ route('registrarUsuario') }}" method="post" class="form_registro">
            @csrf
                <fieldset class="titulo text-center text-orange">Crear Cuenta en SafetyDogs</fieldset>
                <div class="form_nombreUsuario">
                    <div>
                        <!-- Name -->
                        <label for="" class="text-white">Nombre: </label>
                        <input type="text" name="name" id="name" class="name">
                    </div>
                    <div>
                        <!-- First Name -->
                        <label for="" class="text-white">Apellido: </label>
                        <input type="text" name="first_name" id="first_name" class="fist_name">
                    </div>
                </div>
                <!-- Email -->
                <label for="" class="text-white">Correo: </label>
                <input type="text" name="email" id="email" class="email">
                <!-- Password -->
                <label for="" class="text-white">Contraseña: </label>
                <input type="password" name="password" id="password" class="password">
                <!-- Phone -->
                <label for="" class="text-white">Tel. Celular: </label>
                <input type="password" name="cellphone" id="cellphone" class="cellphone">
                <!-- Cellphone -->
                <label for="" class="text-white">Tel. Fijo: </label>
                <input type="password" name="phone" id="phone" class="phone">
                <!-- Boton  -->
                <input type="submit" name="btn_submit" id="btn_submit" class="btn_submit" value="Registrar">
            </form>

            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
        </div>
    </div>
</body>
@stop