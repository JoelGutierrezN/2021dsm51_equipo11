@extends('admin.layouts.master')

@section('titulo', 'Administradores')

@section('contenido')
<body>
    <main>
        <div class="contenedor-administradores">
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
            <table>
                <thead>
                    <th class="text-white FS-1.4">Nombre</th>
                    <th class="text-white FS-1.4">Correo</th>
                    <th class="text-white FS-1.4">Estatus</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($administradores as $administrador)
                    <tr>
                        <td class="FS-1.4">{{ $administrador->name.' '.$administrador->first_name }}</td>
                        <td class="FS-1.4">{{ $administrador->email}}</td>
                        @if($administrador->active == 1)
                        <td class="FS-1.4">Activo</td>
                        @else
                        <td class="FS-1.4">Inactivo</td>
                        @endif
                        <td class="FS-1.4"><a href="{{ route('editor.perfiles',[ 'id' => $administrador->id ] )}}" class="btn btn-primary">Editar</a></td>
                        <td class="FS-1.4"><a href="{{ route('eliminar.administrador',[ 'id' => $administrador->id ] )}}" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>{{$administradores->links()}}</td>
                    </tr>
                </tfoot>
            </table>
        
        <div class="contenedor-botones-administrador">
            <div>
                <button id="agregar" type="button" class="btn btn-success btn-lg">Asignar Nuevo Administrador</button>
            </div>
            <div>
                <button id="crear" type="button"class="btn btn-success btn-lg btn-block">Crear Nuevo Administrador</button>
            </div>
        </div>

        <form action="{{ route('crear.administrador') }}" method="post" id="form-crear">
            @csrf
            <fieldset class="text-white FS-1.6">Crear un Nuevo Administrador</fieldset>
            <input class="form-control form-control-lg" type="text" name="name" placeholder="Nombre">
            <input class="form-control form-control-lg" type="text" name="first_name" placeholder="Apellido">
            <input class="form-control form-control-lg" type="email" name="email" placeholder="Correo">
            <input class="form-control form-control-lg" type="text" name="cellphone" placeholder="Numero Telefonico">
            <input class="form-control form-control-lg" type="password" name="password" placeholder="Contraseña">
            <input class="form-control form-control-lg" type="password" name="confirm_password" placeholder="Confirmar Contraseña">
            <input type="submit" class="btn-success btn btn-lg" value="Crear">
            <div class="cancelar btn btn-danger btn-lg">Cancelar</div>
        </form>

        <form action="{{ route('agregar.administrador') }}" method="post" id="form-agregar">
        @csrf
            <fieldset class="text-white FS-1.6">Agregar Nuevo Administrador</fieldset>
            <input class="form-control form-control-lg" type="text" name="email" placeholder="Correo">
            <input type="submit" class="btn-success btn btn-lg" value="Asignar">
            <div class="cancelar btn btn-danger btn-lg">Cancelar</div>
        </form>
        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function (){

            $('#form-agregar').hide(0);
            $('#form-crear').hide(0);

            $('#agregar').click(function (){
                $('#form-agregar').show(0);
                $('#form-crear').hide(0);
                $('#agregar').addClass("active");
                $('#crear').removeClass("active");
            });

            $('#crear').click(function (){
                $('#form-crear').show(0);
                $('#form-agregar').hide(0);
                $('#crear').addClass("active");
                $('#agregar').removeClass("active");
            });

            $('.cancelar').click(function (){
                $('#form-agregar').hide(0);
                $('#form-crear').hide(0);
                $('#agregar').removeClass("active");
                $('#crear').removeClass("active");
            });
        });
    </script>
</body>
@stop