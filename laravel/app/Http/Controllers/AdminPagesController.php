<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\service;
use App\Models\pet;
use App\Models\address;
use App\Models\room;
use App\Models\reservation;
use App\Models\state;
use App\Models\countrie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminPagesController extends Controller
{
    public function index (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();
            return view('admin.index', [
                'usuario' => $usuario,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function administradores (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();

            $administradores = User::where('rank', 'Admin')->paginate(10);
            return view('admin.pages.administradores', [
                'usuario' => $usuario,
                'user' => $user,
                'administradores' => $administradores
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function editar (Request $request, $id) {
        if($request->session()->get('session_id')){
            $user = User::find($id);
            $usuario = $request->session()->all();
            return view('admin.pages.editar-perfil',[
                'user' => $user,
                'usuario' => $usuario
            ]);
        }else{
            return redirect()->route('login');
        }
    }
}
