<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    public function admin(){
        $id_usuario = session('session_id');

        $user = DB::table('users')->where('id', '=', $id_usuario)->first();
    
        if( is_null($user)){ about(404); }

        return view("admin.index", [
            'user' => $user
        ]);
    }
    
    public function empleado(){

        $id_usuario = session('session_id');

        $user = DB::table('users')->where('id', '=', $id_usuario)->first();

        if( is_null($user)){ about(404); }

        return "empleado.index";
    }
    public function usuario(){
        $id_usuario = session('session_id');

        $user = DB::table('users')->where('id', '=', $id_usuario)->first();

        if( is_null($user)){ about(404); }

        return redirect()->route('indexUsuario');
    }
}
