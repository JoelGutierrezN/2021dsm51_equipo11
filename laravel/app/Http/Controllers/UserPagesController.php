<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserPagesController extends Controller
{
    public function index (Request $request) {
        $usuario = $request->session()->all();
        return view('user.index', [
            'usuario' => $usuario
        ]);
    }
    public function reservaciones (Request $request) {
        
        $habitaciones = DB::table('rooms')->get();

        $usuario = $request->session()->all();
        return view('user.pages.reservaciones', [
            'usuario' => $usuario,
            'habitaciones' => $habitaciones
        ]);
    }
    public function servicios (Request $request) {

        $servicios = DB::table('services')->get();

        $usuario = $request->session()->all();
        return view('user.pages.servicios', [
            'usuario' => $usuario,
            'servicios' => $servicios
        ]);
    }
    public function premium (Request $request) {

        $servicios = DB::table('services')->where('premium', 1)->get();

        $usuario = $request->session()->all();
        return view('user.pages.premium', [
            'usuario' => $usuario,
            'servicios' => $servicios
        ]);
    }
    public function contacto (Request $request) {

        $usuario = $request->session()->all();
        return view('user.pages.premium', [
            'usuario' => $usuario
        ]);
    }
}
