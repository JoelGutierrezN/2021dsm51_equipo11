@extends('user.layouts.master')

@section('titulo', 'Inicio')

@section('contenido')
<div class="banner">
    <div class="contenedor">
        <button class="boton boton-naranja">Reserva Ahora</button>
    </div>
</div>

<main class="container main">
    <section class="seccion-nosotros fondo-naranja-secundario">
        <div>
            <h3 class="texto-vino">Titulo</h3>
            <img src="../img/logo.png" alt="...">
            <p class="text-white">Una compañía en la que puedes confiar

                El bienestar de tu mascota es nuestra prioridad.
                 Productos y servicios confiables y de calidad, para brindarles una vida más saludable y larga a tu mascota
                 Tranquilidad con cada reserva a través de actualizaciones de y video, cobertura veterinaria y atención al cliente 24/7.
                 Cobertura contra accidentes, daños materiales y a terceros incluido en cada reserva.</p>
        </div>
    </section>
    <section class="seccion-servicios">
        <div class="seccion-servicio fondo-naranja">
            
            <h3 class="text-white">Nosotros</h3>
            
            <div class="seccion-servicio-cuerpo">
                <img src="../img/logo.png" alt="...">
                <p>
                    Somos unos amantes de los perros que nos fuimos envolviendo en la idea de crear un lugar especial para cuidarlos, un entorno en donde sean muy felices. Es así que nació Safety Dogs, un lugar en el campo, rodeado de naturaleza, aire puro y sin ruidos molestos.</p>
            </div>
        </div>
        <div class="seccion-servicio fondo-vino">
            
            <h3 class="text-white">Visión</h3>
            
            <div class="seccion-servicio-cuerpo">
                <img src="../img/logo.png" alt="...">
                <p>Apuntamos a ser la mejor alternativa para el cuidado y bienestar de tu mascota, cuando lo necesites.</p>
            </div>
        </div>
        <div class="seccion-servicio fondo-naranja">
            <h3 class="text-white">Misión</h3>
            
            <div class="seccion-servicio-cuerpo">
                <img src="../img/logo.png" alt="...">
                <p>Nuestro propósito es hacer felices a nuestros clientes y a sus mascotas, ofreciendo el más alto nivel de servicio, atención y confiabilidad del mercado.</p>
            </div>
    </section>
</main>
@stop