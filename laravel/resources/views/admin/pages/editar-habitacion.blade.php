@extends('admin.layouts.master')

@section('titulo', 'Editor de Habitacion')

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
        
        <form action="{{ route('actualizar.habitacion') }}" method="post" id="form-crear" enctype="multipart/form-data">
            @csrf
            <fieldset class="text-white FS-1.6">Editar Habitacion | "{{$room->name}}"</fieldset>
            <img src="{{ route('roomImg', ['filename' => $room->img]) }}" alt="">
            <input type="hidden" name="id" value="{{ $room->id }}">
            <input type="file" name="img" id="img" class="inputfile" data-multiple-caption="{count} files selected" multiple>
            <label for="img"> <strong>Subir Foto</strong> </label>
            <select name="rank" class="form-control form-control-lg" id="">
                <option value="0" selected disabled>--Seleccionar--</option>
                <option value="1" class="form-control">Habitacion Sencilla</option>
                <option value="2" class="form-control">Habitacion Basica</option>
                <option value="3" class="form-control">Habitacion Grande</option>
                <option value="4" class="form-control">Habitacion Doble</option>
                <option value="5" class="form-control">Suite de SafetyDogs</option>
            </select>
            <input class="form-control form-control-lg" type="text" name="name" placeholder="Nombre del Servicio" value="{{ $room->name}}">
            <input class="form-control form-control-lg" type="text" name="cost" placeholder="Costo del Servicio" value="{{ $room->cost }}">
            <textarea name="resume" id="" rows="3" class="form-control" placeholder="Resumen del Servicio">{{ $room->resume }}</textarea>
            <textarea name="large_description" id="" rows="12" class="form-control" placeholder="Descripcion larga del Servicio">{{ $room->large_description }}</textarea>
            <input type="submit" class="btn-success btn btn-lg" value="Guardar">
            @if($room->active == 1)
                <a href="{{ route('desactivar.habitacion', ['id' => $room->id]) }}" class="btn btn-danger btn-lg">Deshabilitar</a>
            @else
                <a href="{{ route('activar.habitacion', ['id' => $room->id]) }}" class="btn btn-success btn-lg">Habilitar</a>
            @endif        
        </form>

        </div>
    </main>
    <script src="{{ asset('js/js.js' )}}"></script>
</body>
@stop