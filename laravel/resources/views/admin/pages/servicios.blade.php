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
                    <th class="text-white FS-1.4">Nivel</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($servicios as $servicio)
                    <tr>
                        <td><img src="{{ route('serviceImg', ['filename' => $servicio->img]) }}" alt="" class="imagen-servicio"></td>
                        <td class="FS-1.4">{{ $servicio->name }}</td>
                        <td class="FS-1.4">${{ $servicio->cost}}</td>
                        @if($servicio->premium == 1)
                        <td class="FS-1.4">Premium</td>
                        @else
                        <td class="FS-1.4">Global</td>
                        @endif
                        <td class="FS-1.4"><a href="{{ route('editar.servicio', ['id' => $servicio->id])}}" class="btn btn-primary">Editar</a></td>
                        @if($servicio->active == 1)
                            <td class="FS-1.4"><a href="{{ route('eliminar.servicio', ['id' => $servicio->id]) }}" class="btn btn-danger btn-lg">Deshabilitar</a></td>
                        @else
                            <td class="FS-1.4"><a href="{{ route('activar.servicio', ['id' => $servicio->id]) }}" class="btn btn-success btn-lg">Habilitar</a></td>
                        @endif      
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>{{$servicios->links()}}</td>
                    </tr>
                </tfoot>
            </table>
        
        <div class="contenedor-botones-administrador">
            <div>
                <button id="crear" type="button"class="btn btn-success btn-lg btn-block">Crear Nuevo Servicio</button>
            </div>
        </div>

        <form action="{{ route('crear.servicio') }}" method="post" id="form-crear" enctype="multipart/form-data">
            @csrf
            <fieldset class="text-white FS-1.6">Crear un Nuevo Servicio</fieldset>
            <input type="file" name="img" id="img" class="inputfile" data-multiple-caption="{count} files selected" multiple>
            <label for="img"> <strong>Subir Foto</strong> </label>
            <input class="form-control form-control-lg" type="text" name="name" placeholder="Nombre del Servicio">
            <input class="form-control form-control-lg" type="text" name="cost" placeholder="Costo del Servicio">
            <select name="premium" id="selc_premium" class="form-control form-control-lg">
                <option class="FS-1.6" value="1" selected disabled>--Seleccionar--</option>
                <option class="FS-1.6" value="1">Premium</option>
                <option class="FS-1.6" value="0">Global</option>
            </select>
            <textarea name="resume" id="" rows="3" class="form-control" placeholder="Resumen del Servicio"></textarea>
            <textarea name="large_description" id="" rows="12" class="form-control" placeholder="Descripcion larga del Servicio"></textarea>
            <input type="submit" class="btn-success btn btn-lg" value="Crear">
            <div class="cancelar btn btn-danger btn-lg">Cancelar</div>
        </form>

        </div>
    </main>
    <script src="{{ asset('js/js.js' )}}"></script>
    <script type="text/javascript">
        $(document).ready(function (){

            $('#form-crear').hide(0);

            $('#crear').click(function (){
                $('#form-crear').show(0);
                $('#crear').addClass("active");
            });

            $('.cancelar').click(function (){
                $('#form-crear').hide(0);
                $('#crear').removeClass("active");
            });
        });
    </script>
</body>
@stop