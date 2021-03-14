@extends ('layouts.master')

@section('titulo', 'Iniciar Sesion')

@section('contenido')
<body class="fondo-body">
    <div class="contenedor">
        <div class="contenedor_formulario">
            <form action="{{ route('validar') }}" method="post" class="form-login">
                @csrf
                <img src="img/logo.png" alt="logo">
                <hr>
                <fieldset class="text-yellow titulo-4"> Iniciar Sesion </fieldset>
                <label class="text-orange titulo" for="email"> Correo </label>
                <input type="text" name="email" id="email" class="email" placeholder="ejemplo@correo.com">

                <label class="text-orange titulo" for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="password" placeholder="Contraseña">

                <input type="submit" value="Iniciar Sesion" name="btn_submit" class="boton boton-naranja" id="btn_submit" class="btn_submit">
            </form>
        </div>
    </div>
</body>
@stop