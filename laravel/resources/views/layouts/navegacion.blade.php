<nav class="navbar navbar-expand-lg navegacion">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('inicio') }}">
      <img src="img/logo.png" alt="..." class="d-inline-block align-top logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-orange negrita" id="inicio-link" href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('habitaciones') }}">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('serviciosinv') }}">Servicios</a>
        </li>
      </ul>
    </div>
    <span class="navbar-nav d-flex text-orange sesion">
        <a href="{{ route('login') }}" class="text-orange">Iniciar Sesion</a>
        <div class="text-white"> | </div>
        <a href="{{ route('register') }}" class="texto-amarillo">Registrarse</a>
    </span>
  </div>
</nav>