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
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
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
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
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
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
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

    public function empleados (Request $request) {
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();

            $empleados = User::where('rank', 'Empleado')->paginate(10);
            return view('admin.pages.empleados', [
                'usuario' => $usuario,
                'user' => $user,
                'empleados' => $empleados
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function usuarios (Request $request) {
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();

            $users = User::paginate(10);
            return view('admin.pages.usuarios', [
                'usuario' => $usuario,
                'user' => $user,
                'users' => $users
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function servicios(Request $request){
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();

            $servicios = service::paginate(10);
            return view('admin.pages.servicios', [
                'usuario' => $usuario,
                'user' => $user,
                'servicios' => $servicios
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function editarServicio(Request $request, $id){
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $servicio = service::find($id);
            $usuario = $request->session()->all();
            $user = User::find($request->session()->get('session_id'));

            return view('admin.pages.editar-servicio', [
                'usuario' => $usuario,
                'user' => $user,
                'servicio' => $servicio
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function habitaciones(Request $request){
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();

            $rooms = room::paginate(10);
            return view('admin.pages.habitaciones', [
                'usuario' => $usuario,
                'user' => $user,
                'rooms' => $rooms
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function editarHabitacion(Request $request, $id){
        if($request->session()->get('session_id') || $request->session()->get('session_rank') == "Admin"){
            $room = room::find($id);
            $usuario = $request->session()->all();
            $user = User::find($request->session()->get('session_id'));

            return view('admin.pages.editar-habitacion', [
                'usuario' => $usuario,
                'user' => $user,
                'room' => $room
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function actualizarServicio(Request $request){
        $validate = $this->validate($request,[
            'img' => 'nullable|image',
            'name' => 'required|string',
            'cost' => 'required',
            'resume' => 'required|string',
            'large_description' => 'nullable|string'
        ]);

        $service = service::find($request->input('id'));
        
        $service->name = $request->input('name');
        $service->cost = $request->input('cost');
        $service->resume = $request->input('resume');
        $service->large_description = $request->input('large_description');

        if( is_null($request->input('img')) ){}else{
            $img = $request->file('img');
            $img_full = time().$img->getClientOriginalName();
            Storage::disk('services')->put($img_full, File::get($img));
            $service->img = $img_full;
        }

        if( $service->save() ){
            return redirect()->route('servicios')->with([
                'message' => 'Servicio Actualizado Correctamente!!'
            ]);
        }else{
            return redirect()->route('servicios')->with([
                'error' => 'Error inesperado al actualizar el servicio'
            ]);
        }
    }
}
