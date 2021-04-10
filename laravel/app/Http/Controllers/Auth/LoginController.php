<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function validar(Request $request){
        
        $email = $request->input('email');
        $password = $request->input('password');

        $usuario = DB::table('users')->where('email', $email)->first();

        if(count($usuario) == 0){
            return redirect()->route('login')->with([
                'error' => 'El usuario no existe o no esta registrado'
            ]);
        }else{

            if( $usuario->active == 0){
                return redirect()->route('login')->with([
                    'error' => 'Tu Cuenta Esta Bloqueada. No puedes Ingresar Contacta a un Administrador'
                ]);
            }

            if(Hash::check($password, $usuario->password)){
                $request->session()->put('session_id', $usuario->id);
                $request->session()->put('session_name', ' '.$usuario->name.' '.$usuario->first_name);
                $request->session()->put('session_rank', $usuario->rank);
                $request->session()->put('session_img', $usuario->img);
            
                $session_id = $request->session()->get('session_id');
                $session_name = $request->session()->get('session_name');
                $session_rank = $request->session()->get('session_rank');
                $session_img = $request->session()->get('session_img');

                if( $session_rank == "Admin" ){
                    return redirect()->route('inicioAdmin');
                }else{
                    if( $session_rank == "Empleado" ){
                        return redirect()->route('indexEmpleado');
                    }else{
                        return redirect()->route('sesionUsuario');
                    }
                }
            }else{
                return redirect()->route('login')->with([
                    'error' => 'La contrseña es incorrecta'
                ]);
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_rank');
        $request->session()->forget('session_img');

        return redirect()->route('inicio');
    }
}
