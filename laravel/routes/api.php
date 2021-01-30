<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;
use App\Models\User;
use App\Http\Resources\UserResource;

Route::get('/users', function () {
    return UserResource::collection(User::all());
});


Route::middleware('auth:sanctum')->get('/auth/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user/posts', function (Request $request) {
    return $request->user()->posts;
});

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::post('/auth/token', [TokenController::class, 'store']);
Route::delete('/auth/token', [TokenController::class, 'destroy']);