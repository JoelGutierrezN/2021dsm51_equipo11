@extends('admin.layouts.master')

@section('titulo', 'Empleados')

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
                    <th></th>
                    <th class="text-white FS-1.4">Nombre</th>
                    <th class="text-white FS-1.4">Correo</th>
                    <th class="text-white FS-1.4">Estatus</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($users as $us)
                    <tr>
                        <td><img src="{{ route('userImg', ['filename' => $us->img]) }}" alt="" class="imagen-servicio"></td>
                        <td class="FS-1.4">{{ $us->name.' '.$us->first_name }}</td>
                        <td class="FS-1.4">{{ $us->email}}</td>
                        @if($us->active == 1)
                        <td class="FS-1.4">Activo</td>
                        @else
                        <td class="FS-1.4">Inactivo</td>
                        @endif
                        <td class="FS-1.4"><a href="{{ route('editor.perfiles',[ 'id' => $us->id ] )}}" class="btn btn-primary">Editar</a></td>
                        @if($us->active == 1)
                            <td class="FS-1.4"><a href="{{ route('bloquear.usuario',[ 'id' => $us->id ] )}}" class="btn btn-danger">Bloquear</a></td>
                        @else
                            <td class="FS-1.4"><a href="{{ route('desbloquear.usuario',[ 'id' => $us->id ] )}}" class="btn btn-success">Desbloquear</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>{{$users->links()}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
</body>
@stop