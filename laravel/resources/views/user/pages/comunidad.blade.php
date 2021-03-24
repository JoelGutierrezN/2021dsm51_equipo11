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
                <div class="contenedor-publicaciones">
                    @foreach($images as $image)
                    <div class="publicacion">
                    <!-- Datos del Publicador -->
                        <div>
                            <div class="data-user">
                                <img src="{{ route('userImg', [ 'filename' => $image->user->img ] )}}" width="60px" heigh="60px" alt="imagen_publicador">
                                <p class="FS-2rem">{{ $image->user->name.' '.$image->user->first_name }}</p>
                                <!-- Likes de la Publicacion -->
                                <div class="likes">
                                    <img src="{{ asset('img/like.png') }}" alt="">
                                </div>
                            </div>
                            <div>
                                <p class="fecha-publicacion">{{ \FormatearFecha::LongTimeFilter($image->created_at)}}</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- Texto de la Publicacion -->
                        <div>
                            <textarea class="descripcion-image">{{ $image->description }}</textarea>
                        </div>
                        <hr>
                        <!-- Imagen de la Publicacion -->
                        <div>
                            <img src="{{ route('imageFile', [ 'filename' => $image->image_path ] )}}" alt="imagen" width="750px" heigh="150px">
                        </div>
                        <hr>
                        <!-- Comentarios de la Publicacion -->
                        <div>
                        <a href="{{ route('detalle.publicacion', [ 'id' => $image->id]) }}" class="boton boton-naranja btn btn-comentarios">Comentarios({{ count($image->comments) }})</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="clearfix"></div>
            {{$images->links()}}
        </div>
    </main>
</body>
@stop
