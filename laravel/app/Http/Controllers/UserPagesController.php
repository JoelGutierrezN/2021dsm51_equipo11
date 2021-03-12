<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    public function index (Request $request) {
        $usuario = $request->session()->all();
        return view('user.index', [
            'usuario' => $usuario
        ]);
    }
    public function reservaciones (Request $request) {
        $usuario = $request->session()->all();
        return view('user.pages.reservaciones', [
            'usuario' => $usuario
        ]);
    }
    public function servicios (Request $request) {
        $usuario = $request->session()->all();
        return view('user.pages.servicios', [
            'usuario' => $usuario
        ]);
    }
}
