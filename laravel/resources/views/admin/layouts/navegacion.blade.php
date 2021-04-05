<nav class="navbar navbar-expand-lg navbar-light navegacion">
  <img src="{{ asset( 'img/logo.png' )}}" alt="" height="100px" width="200px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="link-white FS-1.6" href="{{ route('administradores') }}">Administradores</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Empleados</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Reservaciones</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Habitaciones</a>
      </li>
      <span>
        <a href="{{ route('logout') }}" class="link-white FS-1.8">
          <img src="{{asset('img/exit_icon.png')}}" alt="exit_icon">
          Salir
        </a>
      </span>
    </ul>
  </div>
</nav>