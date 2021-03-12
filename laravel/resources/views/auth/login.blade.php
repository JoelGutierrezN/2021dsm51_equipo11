@extends ('layouts.master')

@section('titulo', 'Iniciar Sesion')

@section('contenido')
<body class="fondo-body">
    <div class="contenedor">
        <form action="{{ route('validar') }}" method="post">
            @csrf
            <label for="">Correo: </label>
            <input type="text" name="email" id="email" class="email">

            <label for="">Contraseña: </label>
            <input type="text" name="password" id="password" class="password">

            <input type="submit" value="Iniciar Sesion" name="btn_submit" id="btn_submit" class="btn_submit">
        </form>
    </div>
</body>
@stop