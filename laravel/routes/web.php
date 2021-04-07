<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\EmpleadoPagesController;
use App\Http\Controllers\InvitadoPagesController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
Route::get('/prueba', function(){
    return view('emails.admin-creado');
});
//rutas generales
Route::get('/', [InvitadoPagesController::class, 'index'])->name( 'inicio' ); //home Page
Route::get('/habitaciones', [InvitadoPagesController::class, 'habitaciones'])->name( 'habitaciones' ); //Reservaciones Page
Route::get('/servicios',[InvitadoPagesController::class, 'servicios'])->name( 'serviciosinv' ); // Servicios Page

//rutas login / register
Route::get('/login', [LoginController::class, 'login'])->name( 'login' ); // Login Page
Route::post('/validar', [LoginController::class, 'validar'])->name( 'validar' ); // Validar Login
Route::get('/logout', [LoginController::class, 'logout'])->name( 'logout' ); // Cerrar Sesion
Route::get('/register', [RegisterController::class, 'register'])->name( 'register' ); // Register Page
Route::post('/registrarUsuario', [RegisterController::class, 'guardar'])->name( 'registrarUsuario' ); //registrar usuario

//rutas admin
Route::get('/admin', [SystemController::class, 'admin'])->name( 'inicioAdmin' );
Route::get('/admin/index', [AdminPagesController::class, 'index'])->name( 'indexAdmin' ); // Inicio Admin
Route::get('/admin/administradores', [AdminPagesController::class, 'administradores'])->name( 'administradores' ); // Administradores Page
Route::post('/admin/administradores/crear', [AdministracionController::class, 'crear'])->name( 'crear.administrador' ); // Crear un Administrador
Route::post('/admin/administradores/agregar', [AdministracionController::class, 'agregar'])->name( 'agregar.administrador' ); // Asignar Administrador
Route::post('/admin/administradores/update', [AdministracionController::class, 'update'])->name( 'actualizar.perfil' ); // Asignar Administrador
Route::get('/admin/administradores/editar/{id}', [AdminPagesController::class, 'editar'])->name( 'editor.perfiles' );// Editar Administrador
Route::get('/admin/administradores/eliminar/{id}', [AdministracionController::class, 'eliminar'])->name( 'eliminar.administrador' );// Editar Administrador
Route::get('/admin/reset-password/{id}', [AdministracionController::class, 'resetPassword'])->name( 'reset.password' );// Editar Administrador
Route::get('/admin/empleados', [AdminPagesController::class, 'empleados'])->name( 'empleados' ); // Empleados Page
Route::get('/admin/empleados/eliminar/{id}', [AdministracionController::class, 'eliminarEmpleado'])->name( 'eliminar.empleado' );// Eliminar Empleado
Route::post('/admin/empleados/crear', [AdministracionController::class, 'crearEmpleado'])->name( 'crear.empleado' ); // Crear un Empleado
Route::post('/admin/empleado/agregar', [AdministracionController::class, 'agregarEmpleado'])->name( 'agregar.empleado' ); // Asignar Empleado
Route::get('/admin/usuarios', [AdminPagesController::class, 'usuarios'])->name( 'usuarios' ); // Empleados Page
Route::get('/admin/usuarios/bloquear/{id}', [AdministracionController::class, 'bloquear'])->name( 'bloquear.usuario' ); // Banear Empleado
Route::get('/admin/usuarios/desbloquear/{id}', [AdministracionController::class, 'desbloquear'])->name( 'desbloquear.usuario' ); // desbanear Empleado
Route::get('/admin/servicios', [AdminPagesController::class, 'servicios'])->name( 'servicios' ); // Servicios Page
Route::post('/admin/servicios/crear', [AdministracionController::class, 'crearServicio'])->name('crear.servicio'); //crear servicio 
Route::get('/admin/servicios/editar/{id}', [AdminPagesController::class, 'editarServicio'])->name('editar.servicio'); //Editar servicio 
Route::post('/admin/servicios/actualizar', [AdministracionController::class, 'actualizarServicio'])->name('actualizar.servicio'); //Actualizar servicio 
Route::get('/admin/servicios/eliminar/{id}', [AdministracionController::class, 'eliminarServicio'])->name('eliminar.servicio'); //Desactivar servicio 
Route::get('/admin/servicios/activar/{id}', [AdministracionController::class, 'activarServicio'])->name('activar.servicio'); //Activar servicio 
// Inicio Admin

//rutas empleado
Route::get('/empleado', [SystemController::class, 'empleado'])->name( 'indexEmpleado' ); // Inicio Empleado


//rutas user
Route::get('/usuario', [SystemController::class, 'usuario'])->name( 'sesionUsuario' ); // Inicio Usuario
Route::get('/usuario/indexUsuario', [UserPagesController::class, 'index'])->name( 'indexUsuario' ); // Inicio Usuario
Route::get('/usuario/habitaciones',[UserPagesController::class, 'habitaciones'])->name( 'habitacionesVU' ); //Reservaciones Page
Route::get('/usuario/reservar',[UserPagesController::class, 'reservar'])->name( 'reservarVU' ); //Reservaciones Page
Route::get('/usuario/servicios',[UserPagesController::class, 'servicios'])->name( 'serviciosVU' ); // Servicios Page
Route::get('/usuario/premium',[UserPagesController::class, 'premium'])->name( 'premiumVU' ); // Premium Page
Route::post('/usuario/edit',[UserPagesController::class, 'update'])->name( 'userEdit' ); // Editar Usuario
Route::get('/usuario/userImg/{filename}',[UserPagesController::class, 'getImage'])->name( 'userImg' ); // Obtener Imagen de perfil
Route::get('/usuario/roomImg/{filename}',[UserPagesController::class, 'getRoomImage'])->name( 'roomImg' ); // Obtener Imagen de room
Route::get('/usuario/petImg/{filename}',[UserPagesController::class, 'getPetImage'])->name( 'petImg' ); // Obtener Imagen de pet
Route::get('/usuario/serviceImg/{filename}',[UserPagesController::class, 'getServiceImage'])->name( 'serviceImg' ); // Obtener Imagen de servicio
Route::get('/usuario/imageFile/{filename}',[ComunidadController::class, 'getImage'])->name( 'imageFile' ); // Obtener imagen de publicacion
Route::post('/usuario/saveImage',[ComunidadController::class, 'saveimage'])->name( 'saveImage' ); // Guarduar Imagen de publicacion
Route::post('/usuario/saveComment',[CommentsController::class, 'saveComment'])->name( 'save.comment' ); // Guarduar Comentario de publicacion
Route::get('/usuario/deleteComment/{id}',[CommentsController::class, 'delete'])->name( 'delete.comment' ); // Eliminar Comentario de publicacion
Route::get('/usuario/like/{image_id}',[LikesController::class, 'like'])->name( 'like.save' ); // Generar like de publicacion
Route::get('/usuario/dislike/{image_id}',[LikesController::class, 'dislike'])->name( 'like.delete' ); // Generar dislike de publicacion
Route::get('/usuario/detalle-publicacion/{id}',[ComunidadController::class, 'detail'])->name( 'detalle.publicacion' ); // Detalle publicacion page
Route::get('/usuario/detalle-habitacion/{id}',[UserPagesController::class, 'detalleHabitacion'])->name( 'detalle.habitacion' ); // Rentar Habitacion page
Route::get('/usuario/comunidad',[ComunidadController::class, 'comunidad'])->name( 'comunidadVU' ); // Comunidad Page
Route::get('/usuario/miCuenta',[UserPagesController::class, 'miCuenta'])->name( 'MiCuentaVU' ); // MiCuentaPage
Route::get('/usuario/mascotas',[UserPagesController::class, 'mascotas'])->name( 'mascotasVU' ); // Mascotas Page
Route::get('/usuario/municipios/{state_id}',[UserPagesController::class, 'getMunicipios'])->name( 'getMunicipios' ); // Jalar Municipios Page
Route::post('/usuario/guardarMascota',[UserPagesController::class, 'guardarMascota'])->name( 'guardar.mascota' ); // Guardar Mascota Page
Route::post('/usuario/guardarDireccion',[UserPagesController::class, 'guardarDireccion'])->name( 'guardar.direccion' ); // Guardar Direccion Page
Route::get('/usuario/direcciones',[UserPagesController::class, 'direcciones'])->name( 'direccionesVU' ); // Direcciones Page
Route::get('/usuario/reservaciones',[UserPagesController::class, 'reservaciones'])->name( 'reservacionesVU' ); // Reservacines Page


