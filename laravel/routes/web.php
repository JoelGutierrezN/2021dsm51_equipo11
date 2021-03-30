<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\InvitadoPagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


//rutas generales
Route::get('/', [InvitadoPagesController::class, 'index'])->name( 'inicio' ); //home Page
Route::get('/habitaciones', [InvitadoPagesController::class, 'habitaciones'])->name( 'habitaciones' ); //Reservaciones Page
Route::get('/servicios',[InvitadoPagesController::class, 'servicios'])->name( 'servicios' ); // Servicios Page

//rutas login / register
Route::get('/login', [LoginController::class, 'login'])->name( 'login' ); // Login Page
Route::post('/validar', [LoginController::class, 'validar'])->name( 'validar' ); // Validar Login
Route::get('/logout', [LoginController::class, 'logout'])->name( 'logout' ); // Cerrar Sesion
Route::get('/register', [RegisterController::class, 'register'])->name( 'register' ); // Register Page
Route::post('/registrarUsuario', [RegisterController::class, 'guardar'])->name( 'registrarUsuario' ); //registrar usuario

//rutas admin
Route::get('/admin', [SystemController::class, 'admin'])->name( 'inicioAdmin' ); // Inicio Admin

//rutas empleado
Route::get('/empleado', [SystemController::class, 'empleado'])->name( 'inicioEmpleado' ); // Inicio Empleado

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


