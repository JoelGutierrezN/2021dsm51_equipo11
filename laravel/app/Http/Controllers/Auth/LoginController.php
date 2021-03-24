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

        if(Hash::check($password, $usuario->password)){
            $request->session()->put('session_id', $usuario->id);
            $request->session()->put('session_name', ' '.$usuario->name.' '.$usuario->first_name);
            $request->session()->put('session_rank', $usuario->rank);
        
            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_rank = $request->session()->get('session_rank');

            if( $session_rank == "Admin" ){
                return redirect()->route('inicioAdmin');
            }else{
                if( $session_rank == "Empleado" ){
                    return redirect()->route('inicioEmpleado');
                }else{
                    return redirect()->route('sesionUsuario');
                }
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_rank');

        return redirect()->route('inicio');
    }
}
