<nav class="navbar navbar-expand-lg navegacion">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('indexUsuario') }}">
      <img src="../img/logo.png" alt="..." class="d-inline-block align-top logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-orange negrita" id="inicio-link" href="{{ route('indexUsuario') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('reservacionesVU') }}">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('serviciosVU') }}">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('comunidadVU') }}">Comunidad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link texto-blanco" href="{{ route('premiumVU') }}">SafetyDogs Premium</a>
        </li>
        @if ($usuario['session_rank'] == "Premium")
        <li class="nav-item">
          <a class="nav-link link-orange titulo-usuario" href="{{ route('servicios') }}">Live Support</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-orange titulo-usuario" href="{{ route('servicios') }}">Live Pet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-orange titulo-usuario" href="{{ route('servicios') }}">Premium</a>
        </li>
        @endif
      </ul>
    </div>
    <span class="navbar-nav nav-derecha">
        <div class="rango-usuario">
<<<<<<< HEAD
          <img src="{{ route('userImg', ['filename' => $usuario['session_img'] ] )}}" alt="imagen de usuario" width="40px" heigh="40px">&nbsp
=======
          <img src="../img/user_img/user.png" alt="imagen de usuario" width="40px" heigh="40px">&nbsp
>>>>>>> parent of 172b006 (avances foro)
          @if ($usuario['session_rank'] == "Premium")
            <p class="text-orange titulo-usuario">{{ $usuario['session_rank'] }} &nbsp</p>
          @else
            <p class="text-white titulo-usuario">{{ $usuario['session_rank'] }} &nbsp</p>
          @endif
        </div>
        <a href="#" class="link-blanco FW-900"> {{ $usuario['session_name']}} </a>
        &nbsp <p class="text-orange">_</p> &nbsp 
        <a href="{{ route('logout') }}" class="link-amarillo">Cerrar Sesion</a>
    </span>
  </div>
</nav>