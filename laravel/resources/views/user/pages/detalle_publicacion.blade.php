@extends('user.layouts.master')

@section('titulo', 'Comunidad')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor">
        <div class="contenedor-comunidad">
            <div>
                <!-- Contenedor Crear Post -->
                <div>
                @if( session('message') )
                    <div class="alert alert-success FS-2rem">
                        {{ session('message') }}
                    </div>
                @endif
                </div>

                <!-- Publicaciones -->
                <div class="contenedor-publicaciones">
                    <a href="{{ route('comunidadVU') }}"><img src="{{ asset('img/exit.png') }}" alt="exit" class="exit-icon"></a>
                    <div class="publicacion">
                    <!-- Datos del Publicador -->
                        <div>
                            <div class="data-user">
                                <img src="{{ route('userImg', [ 'filename' => $image->user->img ] )}}" width="60px" heigh="60px" alt="imagen_publicador">
                                <p class="FS-2rem">{{ $image->user->name.' '.$image->user->first_name }}</p>
                                <!-- Likes de la Publicacion -->
                                <div class="likes">
                                    <?php $user_like = false; ?>
                                    @foreach($image->likes as $like)
                                        @if($like->user->id == $user->id)
                                            <?php $user_like = true; ?>
                                        @endif
                                    @endforeach

                                    @if($user_like)
                                        <img src="{{ asset('img/like.png') }}" data-id="{{$image->id}}" alt="" class="btn-like">
                                    @else
                                        <img src="{{ asset('img/like_pulsado.png') }}"  data-id="{{$image->id}}" alt="" class="btn-dislike">
                                    @endif
                                    <div class="num-likes">{{ count($image->likes) }}</div>
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
                        <!-- Comentarios de la Publicacion -->
                        <div>
                        <h2 class="text-orange titulo text-comentarios">Comentarios ({{ count($image->comments) }})</h2>
                            <hr>
                            <div class="comentarios-seccion">
                                @foreach( $image->comments as $comment )
                                        <div class="contenedor-comentario">
                                            <!-- Datos del Comentador -->
                                            <div class="data-user">
                                                <img src="{{ route('userImg', [ 'filename' => $comment->user->img ] )}}" width="60px" heigh="60px" alt="imagen_publicador">
                                                <p class="FS-2rem">{{ $comment->user->name.' '.$comment->user->first_name }}</p>
                                                <span class="fecha-publicacion comment-margin">{{ \FormatearFecha::LongTimeFilter($comment->created_at)}}</span>
                                            </div>
                                            <br>
                                            <!-- Comentario del Comentador -->
                                            <div class="">
                                                <textarea class="comentario">{{ $comment->content }}</textarea>
                                                @if($user->id == $comment->user_id || $comment->image->user_id == $user->id)
                                                    <a href="{{ route('delete.comment', [ 'id' => $comment->id ]) }}" class="eliminar-comment">Eliminar</a>
                                                @endif
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                            <hr>
                            <!-- Generar un nuevo comentario -->
                            <div>
                                <form action="{{ route('save.comment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">

                                    <textarea name="content" id="" cols="30" rows="10" class="nuevo-comentario" required></textarea><br>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                
                                    <button type="submit" class="btn btn-lg boton-naranja">Publicar Comentario</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</body>
@stop

