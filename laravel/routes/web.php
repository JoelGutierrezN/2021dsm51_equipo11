<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\InvitadoPagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


//rutas generales
Route::get('/', function(){ return view('inicio'); })->name( 'inicio' ); //home Page
Route::get('/reservaciones', [InvitadoPagesController::class, 'reservaciones'])->name( 'reservaciones' ); //Reservaciones Page
Route::get('/servicios', function(){ return view('pages.servicios'); })->name( 'servicios' ); // Servicios Page

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
