@extends('admin.layouts.master')

@section('titulo', 'Editor')

@section('contenido')
    <body>
        <main>
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

            @if( session('error') )
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('actualizar.perfil') }}" method="post" id="form-crear" class="FS-1.6">
                @csrf
                <fieldset class="text-white FS-1.6">Editar Perfil Existente</fieldset>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input class="form-control form-control-lg FS-1.6" type="text" name="name" placeholder="Nombre" value="{{ $user->name }}">
                <input class="form-control form-control-lg FS-1.6" type="text" name="first_name" placeholder="Apellido" value="{{ $user->first_name}}">
                <input class="form-control form-control-lg FS-1.6" type="email" name="email" placeholder="Correo" value="{{ $user->email }}">
                <input class="form-control form-control-lg FS-1.6" type="text" name="cellphone" placeholder="Numero Telefonico" value="{{ $user->cellphone }}">
                <input class="form-control form-control-lg FS-1.6" type="text" name="phone" placeholder="Numero Telefonico" value="{{ $user->phone }}">

                <select name="rank" id="selc_rank" class="form-control FS-1.6" disabled>
                    <option value="{{ $user->rank }}" selected class="FS-1.6">{{ $user->rank }}</option>
                    @if($user->rank == "Admin")
                        <option value="Usuario" class="FS-1.6">Usuario</option>
                        <option value="Empleado" class="FS-1.6">Empleado</option>
                    @endif
                    @if($user->rank == "Empleado")
                        <option value="Usuario" class="FS-1.6">Usuario</option>
                        <option value="Admin" class="FS-1.6">Admin</option>
                    @endif 
                    @if($user->rank == "Usuario")
                        <option value="Admin" class="FS-1.6">Admin</option>
                        <option value="Empleado" class="FS-1.6">Empleado</option>
                    @endif
                </select>

                @if($user->active == 1)
                <select name="active" id="selc_active" class="form-control FS-1.6" disabled>
                    <option value="1" selected class="FS-1.6">Cuenta Activa</option>
                    <option value="0" class="FS-1.6">Cuenta Inactiva</option>
                </select>
                @else
                <select name="active" id="selc_active" class="form-control FS-1.6" disabled>
                    <option value="0" selected class="FS-1.6">Cuenta Inactiva</option>
                    <option value="1" class="FS-1.6">Cuenta Activa</option>
                </select>
                @endif
                <a href="{{ route('reset.password', ['id' => $user->id]) }}" class="btn btn-warning btn-lg">Restablecer Contraseña de Usuario</a>
                <input type="submit" class="btn-success btn btn-lg" value="Actualizar">
                <a href="{{ route('indexAdmin') }}" class="cancelar btn btn-danger btn-lg">Cancelar</a>
            </form>
        </main>
    </body>
@stop