@extends('layouts.master')

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
                <img src="img/logo.png" alt="...">
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorum porro quis itaque cupiditate consectetur repellat dicta? Perferendis, a! Molestiae labore assumenda nam perspiciatis facilis rerum nulla expedita reiciendis? Obcaecati.</p>
            </div>
        </section>
        <section class="seccion-servicios">
            <div class="seccion-servicio fondo-naranja">
                
                <h3 class="text-white">Titlulo</h3>
                
                <div class="seccion-servicio-cuerpo">
                    <img src="img/logo.png" alt="...">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam nam labore non blanditiis quaerat laboriosam doloribus. Recusandae culpa dicta vitae asperiores? Libero consectetur consequuntur deleniti nemo, repellendus qui nisi?</p>
                </div>
            </div>
            <div class="seccion-servicio fondo-vino">
                
                <h3 class="text-white">Titlulo</h3>
                
                <div class="seccion-servicio-cuerpo">
                    <img src="img/logo.png" alt="...">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam nam labore non blanditiis quaerat laboriosam doloribus. Recusandae culpa dicta vitae asperiores? Libero consectetur consequuntur deleniti nemo, repellendus qui nisi?</p>
                </div>
            </div>
            <div class="seccion-servicio fondo-naranja">
               <h3 class="text-white">Titlulo</h3>
                
                <div class="seccion-servicio-cuerpo">
                    <img src="img/logo.png" alt="...">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam nam labore non blanditiis quaerat laboriosam doloribus. Recusandae culpa dicta vitae asperiores? Libero consectetur consequuntur deleniti nemo, repellendus qui nisi?</p>
                </div>
        </section>
    </main>
@stop
