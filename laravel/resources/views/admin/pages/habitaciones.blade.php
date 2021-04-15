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
                    <th class="text-white FS-1.4">Costo</th>
                    <th class="text-white FS-1.4">Sensores</th>
                    <th class="text-white FS-1.4">Alerta</th>
                    <th class="text-white FS-1.4">Estado</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td><img src="{{ route('roomImg', ['filename' => $room->img]) }}" alt="" class="imagen-servicio"></td>
                        <td class="FS-1.4">{{ $room->name }}</td>
                        <td class="FS-1.4">${{ $room->cost}}</td>
                        <td></td>
                        <td></td>
                        <td class="FS-1.4"><a href="{{ route('editar.habitacion', ['id' => $room->id])}}" class="btn btn-primary">Editar</a></td>
                        @if($room->active == 1)
                            <td class="FS-1.4"><a href="{{ route('desactivar.habitacion', ['id' => $room->id]) }}" class="btn btn-danger btn-lg">Deshabilitar</a></td>
                        @else
                            <td class="FS-1.4"><a href="{{ route('activar.habitacion', ['id' => $room->id]) }}" class="btn btn-success btn-lg">Habilitar</a></td>
                        @endif      
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>{{$rooms->links()}}</td>
                    </tr>
                </tfoot>
            </table>
    </main>
    <script src="{{ asset('js/js.js' )}}"></script>
</body>
@stop