<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\InvitadoPagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ComunidadController;
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
Route::get('/usuario/reservaciones',[UserPagesController::class, 'reservaciones'])->name( 'reservacionesVU' ); //Reservaciones Page
Route::get('/usuario/servicios',[UserPagesController::class, 'servicios'])->name( 'serviciosVU' ); // Servicios Page
Route::get('/usuario/premium',[UserPagesController::class, 'premium'])->name( 'premiumVU' ); // Premium Page
Route::get('/usuario/config',[UserPagesController::class, 'config'])->name( 'configVU' ); // Premium Page
Route::post('/usuario/edit',[UserPagesController::class, 'update'])->name( 'userEdit' ); // Premium Page
Route::get('/usuario/userImg/{filename}',[UserPagesController::class, 'getImage'])->name( 'userImg' ); // Premium Page
Route::get('/usuario/comunidad',[ComunidadController::class, 'comunidad'])->name( 'comunidadVU' ); // Premium Page
Route::post('/usuario/saveImage',[ComunidadController::class, 'saveimage'])->name( 'saveImage' ); // Premium Page


