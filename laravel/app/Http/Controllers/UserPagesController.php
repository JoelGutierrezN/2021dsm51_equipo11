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

    public function config(Request $request){

        $usuario = $request->session()->all();

        $DatosUsuario = DB::table('users')->where('id', $usuario['session_id'])->first();

        return view('user.pages.config', [
            'usuario' => $usuario,
            'DatosUsuario' => $DatosUsuario
        ]);
    }

    public function update(Request $request){
        
        $usuario = $request->session()->all();

        $id = $usuario['session_id'];
        $name = $request->input('name');
        $first_name = $request->input('first_name');
        $email = $request->input('email');
        $img = $request->input('img');
        $cellphone = $request->input('cellphone');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        /* var_dump($id);
        var_dump($name);
        var_dump($first_name);

        die(); */

        
    }
}
