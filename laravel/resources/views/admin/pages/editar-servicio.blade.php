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
        
        <form action="{{ route('actualizar.servicio') }}" method="post" id="form-crear" enctype="multipart/form-data">
            @csrf
            <fieldset class="text-white FS-1.6">Editar Servicio | "{{$servicio->name}}"</fieldset>
            <img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="">
            <input type="hidden" name="id" value="{{ $servicio->id }}">
            <input type="file" name="img" id="img" class="inputfile" data-multiple-caption="{count} files selected" multiple>
            <label for="img"> <strong>Subir Foto</strong> </label>
            <input class="form-control form-control-lg" type="text" name="name" placeholder="Nombre del Servicio" value="{{ $servicio->name}}">
            <input class="form-control form-control-lg" type="text" name="cost" placeholder="Costo del Servicio" value="{{ $servicio->cost }}">
            <select name="premium" id="selc_premium" class="form-control form-control-lg">
                <?php
                    if($servicio->premium == 1){ 
                        $premium = "Premium"; 
                    }else{
                        $premium = "Global";
                    }
                ?>
                <option class="FS-1.6" value="{{$servicio->premium}}" selected disabled>--Actualmente <?php echo $premium ?>--</option>
                <option class="FS-1.6" value="1">Premium</option>
                <option class="FS-1.6" value="0">Global</option>
            </select>
            <textarea name="resume" id="" rows="3" class="form-control" placeholder="Resumen del Servicio">{{ $servicio->resume }}</textarea>
            <textarea name="large_description" id="" rows="12" class="form-control" placeholder="Descripcion larga del Servicio">{{ $servicio->large_description }}</textarea>
            <input type="submit" class="btn-success btn btn-lg" value="Guardar">
            @if($servicio->active == 1)
                <a href="{{ route('eliminar.servicio', ['id' => $servicio->id]) }}" class="btn btn-danger btn-lg">Deshabilitar</a>
            @else
                <a href="{{ route('activar.servicio', ['id' => $servicio->id]) }}" class="btn btn-success btn-lg">Habilitar</a>
            @endif        
        </form>

        </div>
    </main>
    <script src="{{ asset('js/js.js' )}}"></script>
</body>
@stop