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

class AdministracionController extends Controller
{
    public function crear ( Request $request ){
        
        $validate = $this->validate($request,[
            'name' => 'required|string',
            'first_name' => 'required|string',
            'cellphone' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->cellphone = $request->input('cellphone');
        $user->rank = "Admin";

        if($request->input('password') == $request->input('confirm_password')){
            $password = $request->input('password');
            $user->password = bcrypt($password);
        }else{
            return redirect()->route('administradores')->with([
                'error' => 'Las Contraseñas no Coinciden'
            ]);
        }
        

        if( $user->save() ){
            return redirect()->route('administradores')->with([
                'message' => 'Administrador Creado Correctamente'
            ]);
        }else{
            return redirect()->route('administradores')->with([
                'error' => 'Error Inesperado al Registrar al Administrador'
            ]);
        }
    }

    public function agregar ( Request $request ){

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if(is_null($user)){
            return redirect()->route('administradores')->with([
                'error' => 'El Correo especificado no existe'
            ]);
        }

        $user->rank = "Admin";

        if( $user->save() ){
            return redirect()->route('administradores')->with([
                'message' => 'Administrador Asignado Corrrectamente'
            ]);
        }else{
            return redirect()->route('administradores')->with([
                'error' => 'Error Inesperado al Asignar al Administrador'
            ]);
        }
    }

    public function update(Request $request) {

        $id = $request->input('id');
        $user = User::find($id);

        $validate = $this->validate($request,[
            'name' => 'required|string',
            'first_name' => 'required|string',
            'cellphone' => 'required|string',
            'phone' => 'nullable',
        ]);

        $data = [];

        Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if( is_null($request->input('password')) ){}else{
            $password = $request->input('password');
            $user->password = bcrypt($password);
        }


        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->cellphone = $request->input('cellphone');
        $user->phone = $request->input('phone');
        $user->rank = $request->input('rank');
        $user->active = $request->input('active');

        if( $user->save() ){
            if($user->rank == "Admin"){
                return redirect()->route('administradores')->with([
                    'message' => 'Administrador Guardado Correctamente'
                ]);
            }else if($user->rank == "Empleado"){
                return redirect()->route('empleados')->with([
                    'message' => 'Empleado Guardado Correctamente'
                ]);
            }else{
                return redirect()->route('usuarios')->with([
                    'message' => 'Usuario Guardado Correctamente'
                ]);
            }
        }else{
            return redirect()->route('usuarios')->with([
                'error' => 'Error inesperado al realiar esta accion'
            ]);
        }
    }

    public function eliminar($id){
        $user = User::find($id);

        if(is_null($user)){
            return redirect()->route('administradores')->with([
                'error' => "El Administrador no Existe"
            ]);
        }else{
            $user->rank = "Usuario";

            if( $user->save() ){
                return redirect()->route('administradores')->with([
                    'message' => "Fue eliminado correctamente"
                ]);
            }else{
                return redirect()->route('administradores')->with([
                    'error' => "Error Inesperado al Eliminar el Administrador"
                ]);
            }
        }
    }
}
