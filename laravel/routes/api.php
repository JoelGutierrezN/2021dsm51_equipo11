<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CountrieController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;

//Tokens Sanctum
Route::middleware('auth:sanctum')->get('/auth/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user/posts', function (Request $request) {
    return $request->user()->posts;
});

Route::post('/auth/token', [TokenController::class, 'store']);
Route::delete('/auth/token', [TokenController::class, 'destroy']);

//Tokens Users
Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::post('/tokens/create', function (Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(!auth()->attempt($request->only('email', 'password'))){
        throw new AuthenticationException();
    }

    return [
        'token' => auth()->user()->createToken('test')->plainTextToken
    ];
});

//Resources 
    // User
        Route::middleware('auth:sanctum')->group(function(){
            Route::apiResource('usuarios', UserController::class)->except(['create', 'edit']);
        });