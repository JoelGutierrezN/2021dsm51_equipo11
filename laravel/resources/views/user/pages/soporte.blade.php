@extends('user.layouts.master')

@section('titulo', 'Premium')

@section('contenido')
<body class="fondo-body">
    <main class="contenedor-premium">
        <div class="layout-premium">
            <div class="beneficios-premium">
                <div class="texto-naranja-secundario titulo-3">¡Servicios Unicos!</div>
                @foreach($servicios as $servicio)
                    <div class="servicio-premium">
                        <img src="..{{$servicio->img}}" alt="service-img">
                        <hr>
                        <div class="text-white titulo-3 fondo-negro">{{ $servicio->name }}</div>
                        <textarea name="resume" id="resume" class="resume-servicio" cols="40" rows="8">{{ $servicio->resume }}</textarea>
                        <hr>
                        <div class="text-white fondo-negro FS-1-4rem">Gratis con <span class="texto-naranja-secundario titulo">Premium</span></div>
                    </div>
                @endforeach
            </div>
            <div class="cuerpo-premium text-center">
                <div class="FS-2rem text-white">Conocer la Membresia <span class="texto-naranja-secundario titulo-3">Premium</span> de <img src="/img/logo.png" alt="logo" width="150px"></div>
                <div class="collage-premium text-white FS-1-4rem">
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, nulla ab? Commodi, maiores impedit nobis, nemo corporis ut earum, dolores natus aliquam nisi ab. Ipsum animi alias recusandae numquam adipisci.</div>
                </div>
            </div>
        </div>
            <div class="plan-premium">
                div
            </div>
    </main>
</body>
@stop
