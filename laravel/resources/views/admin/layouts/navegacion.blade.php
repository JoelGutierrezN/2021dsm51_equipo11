<nav class="navbar navbar-expand-lg navbar-light navegacion">
  <a href="{{ route('indexUsuario') }}">
    <img src="{{ asset( 'img/logo.png' )}}" alt="" height="60px" width="200px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="link-white FS-1.6" href="{{ route('administradores') }}">Administradores</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="{{ route('usuarios') }}">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="{{ route('empleados') }}">Empleados</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="#">Reservaciones</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="{{ route('servicios') }}">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="link-white FS-1.6" href="{{ route('admin.habitaciones') }}">Habitaciones</a>
      </li>
      <span>
        <a href="{{ route('logout') }}" class="link-white FS-1.8">
          <img src="{{asset('img/exit_icon.png')}}" alt="exit_icon">
          Salir
        </a>
        <img src="{{ route('userImg',['filename' => $user->img ])}}" alt="" class="imagen-usuario">
        <div>
          <h6 class="FS-1.4 text-white">{{$user->name.' '.$user->first_name}}</h6>
          <h6 class="FS-1.4 text-white">Rango: {{$user->rank}}</h6>
        </div>
      </span>
    </ul>
  </div>
</nav>