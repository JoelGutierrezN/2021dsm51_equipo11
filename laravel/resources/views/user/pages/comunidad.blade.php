@extends('user.layouts.master')

@section('titulo', 'Comunidad')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor">
        <div class="contenedor-comunidad">
            <div>
                <!-- Contenedor Crear Post -->
                <div>
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
                    <form action="{{ route('saveImage') }}" class="publicar" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- Contenedor Descripcion -->
                        <div>
                            <input type="file" name="image_path" id="image_path" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                            <label for="image_path"> <strong>Seleccionar una Imagen para Publicar</strong> </label>
                        </div>
                        <hr>
                        <!-- Contenedor Imagen -->
                        <div>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Comenta algo para tu imagen..."></textarea>
                        </div>
                        <hr>
                        <!-- Contenedor Boton -->
                        <div>
                            <input type="submit" value="Publicar" class="boton boton-naranja">
                        </div>
                    </form>
                </div>

                <hr>

            <!-- Publicaciones -->
            @foreach($images as $image)
            <div class="publicacion">
                <!-- Datos del Publicador -->
                <div>
                    {{ $image->user->name }}
                </div>
                <!-- Texto de la Publicacion -->
                <div>
                    {{ $image->description }}
                </div>
                <!-- Imagen de la Publicacion -->
                <div>
                    <img src="#" alt="imagen">
                </div>
                <!-- Likes de la Publicacion -->
                <div>
                </div>
                <!-- Comentarios de la Publicacion -->
                <div>
                    <!-- Datos del Comentador -->
                    <div>
                        
                    </div>
                    <!-- Comentario del Comentador -->
                    <div>
                        {{ $image->comment }}
                    </div>
                </div>
            </div>
            @endforeach


            </div>
        </div>
    </main>
    <script type="text/javascript" src="../js/js.js"></script>
</body>
@stop
