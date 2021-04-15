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
use App\Mail\adminCreado;
use App\Mail\adminEliminado;
use App\Mail\adminAgregado;
use App\Mail\PassReset;
use App\Mail\EmpleadoCreado;
use App\Mail\EmpleadoEliminado;
use App\Mail\EmpleadoAgregado;
use App\Mail\UsuarioBloqueado;
use App\Mail\UsuarioDesbloqueado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $password = Str::random(8);
        $data = new User();
        $data->password = $password;
        $data->email = $user->email;
        $data->name = $user->name;
        $data->first_name = $user->first_name;
        $admin = User::find($request->session()->get('session_id'));
        $correo = new adminCreado($data, $admin);
        
        $user->password = bcrypt($password);

        if( $user->save() ){

            Mail::to($user->email)->send($correo);

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

        $data = new User();
        $data->email = $user->email;
        $data->name = $user->name;
        $data->first_name = $user->first_name;
        $admin = User::find($request->session()->get('session_id'));
        $correo = new adminAgregado($data, $admin);

        $user->rank = "Admin";

        if( $user->save() ){
            Mail::to($user->email)->send($correo);
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

    public function eliminar(Request $request, $id){
        $user = User::find($id);

        if(is_null($user)){
            return redirect()->route('administradores')->with([
                'error' => "El Administrador no Existe"
            ]);
        }else{
            $user->rank = "Usuario";

            $data = new User();
            $data->email = $user->email;
            $data->name = $user->name;
            $data->first_name = $user->first_name;
            $admin = User::find($request->session()->get('session_id'));
            $correo = new adminEliminado($data, $admin);

            if( $user->save() ){
                Mail::to($user->email)->send($correo);
                return redirect()->route('administradores')->with([
                    'message' => "El administrador fue eliminado correctamente"
                ]);
            }else{
                return redirect()->route('administradores')->with([
                    'error' => "Error Inesperado al Eliminar el Administrador"
                ]);
            }
        }
    }

    public function resetPassword(Request $request, $id){
        $user = User::find($id);
        $admin = User::find($request->session()->get('session_id'));

        $password = Str::random(8);

        $data = new User();

        $data->name = $user->name;
        $data->first_name = $user->first_name;
        $data->password = $password;

        $user->password = bcrypt($password);

        $correo = new PassReset($data, $admin);

        if( $user->save() ){
            Mail::to($user->email)->send($correo);
            return redirect()->route('editor.perfiles',[ 'id' => $user->id])->with([
                'message' => 'Contraseña de Usuario Restablecida Correctamente'
            ]);
        }else{
            return redirect()->route('editor.perfiles',[ 'id' => $user->id])->with([
                'error' => 'Error inesperado al actualizar la contraseña del usuario'
            ]);
        }

    }

    public function agregarEmpleado(Request $request){
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if(is_null($user)){
            return redirect()->route('empleados')->with([
                'error' => 'El Correo especificado no existe'
            ]);
        }

        $data = new User();
        $data->email = $user->email;
        $data->name = $user->name;
        $data->first_name = $user->first_name;
        $admin = User::find($request->session()->get('session_id'));
        $correo = new EmpleadoAgregado($data, $admin);
        
        $user->rank = "Empleado";

        if( $user->save() ){
            Mail::to($user->email)->send($correo);
            return redirect()->route('empleados')->with([
                'message' => 'Empleado Asignado Corrrectamente'
            ]);
        }else{
            return redirect()->route('empleados')->with([
                'error' => 'Error Inesperado al Asignar al Empleado'
            ]);
        }
    }

    public function crearEmpleado(Request $request){
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
        $user->rank = "Empleado";

        $password = Str::random(8);
        $data = new User();
        $data->password = $password;
        $data->email = $user->email;
        $data->name = $user->name;
        $data->first_name = $user->first_name;
        $admin = User::find($request->session()->get('session_id'));
        $correo = new EmpleadoCreado($data, $admin);
        
        $user->password = bcrypt($password);

        if( $user->save() ){

            Mail::to($user->email)->send($correo);

            return redirect()->route('empleados')->with([
                'message' => 'Empleado Creado Correctamente'
            ]);
        }else{
            return redirect()->route('empleados')->with([
                'error' => 'Error Inesperado al Registrar al Empleado'
            ]);
        }
    }

    public function eliminarEmpleado(Request $request, $id){
        $user = User::find($id);

        if(is_null($user)){
            return redirect()->route('administradores')->with([
                'error' => "El Administrador no Existe"
            ]);
        }else{
            $data = new User();
            $data->email = $user->email;
            $data->name = $user->name;
            $data->first_name = $user->first_name;
            $admin = User::find($request->session()->get('session_id'));
            $correo = new EmpleadoEliminado($data, $admin);
            $user->rank = "Usuario";
            
            if( $user->save() ){
                Mail::to($user->email)->send($correo);
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

    public function bloquear(Request $request, $id){
        $user = User::find($id);
        $admin = User::find($request->session()->get('session_id'));
        $data = new User();

        $user->active = 0;
        $data->name = $user->name;
        $data->first_name = $user->first_name;

        $correo = new UsuarioBloqueado($data, $admin);
    
        if( $user->save() ){
            Mail::to($user->email)->send($correo);

            return redirect()->route('usuarios')->with([
                'message' => 'Usuario Bloqueado Correctamente'
            ]);
        }else{
            return redirect()->route('usuarios')->with([
                'error' => 'Error inesperado al bloquear el usuario'
            ]);
        }
    }

    public function desbloquear(Request $request, $id){
        $user = User::find($id);
        $admin = User::find($request->session()->get('session_id'));
        $data = new User();

        $user->active = 1;
        $data->name = $user->name;
        $data->first_name = $user->first_name;

        $correo = new UsuarioDesbloqueado($data, $admin);
    
        if( $user->save() ){
            Mail::to($user->email)->send($correo);

            return redirect()->route('usuarios')->with([
                'message' => 'Usuario Bloqueado Correctamente'
            ]);
        }else{
            return redirect()->route('usuarios')->with([
                'error' => 'Error inesperado al bloquear el usuario'
            ]);
        }
    }

    public function crearServicio(Request $request){

        $validate = $this->validate($request,[
            'img' => 'required|image',
            'name' => 'required|string',
            'cost' => 'required',
            'resume' => 'required|string',
            'large_description' => 'nullable|string'
        ]);

        $servicio = new service();

        $servicio->name = $request->input('name');
        $servicio->cost = $request->input('cost');
        $servicio->resume = $request->input('resume');
        $servicio->large_description = $request->input('large_description');

        $img = $request->file('img');
        $img_full = time().$img->getClientOriginalName();
        Storage::disk('services')->put($img_full, File::get($img));
        $servicio->img = $img_full;
        
        if( $servicio->save() ){
            return redirect()->route('servicios')->with([
                'message' => 'Servicio Creado con Exito!!'
            ]);
        }else{
            return redirect()->route('servicios')->with([
                'error' => 'Error inesperado al guardar el servicio'
            ]);
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

    public function eliminarServicio(Request $request, $id){
        $servicio = service::find($id);

        $servicio->active = 0;

        if($servicio->save()){
            return redirect()->route('servicios')->with([
                'message' => 'Servicio Deshabilitado Correctamente'
            ]);
        }else{
            return redirect()->route('servicios')->with([
                'error' => 'Error inesperado al deshabilitar el servicio'
            ]);
        }
    }

    public function activarServicio(Request $request, $id){
        $servicio = service::find($id);

        $servicio->active = 1;

        if($servicio->save()){
            return redirect()->route('servicios')->with([
                'message' => 'Servicio Deshabilitado Correctamente'
            ]);
        }else{
            return redirect()->route('servicios')->with([
                'error' => 'Error inesperado al deshabilitar el servicio'
            ]);
        }
    }

    public function actualizarHabitacion(Request $request){
        $validate = $this->validate($request,[
            'img' => 'nullable|image',
            'name' => 'required|string',
            'cost' => 'required',
            'rank' => 'required',
            'resume' => 'required|string',
            'large_description' => 'nullable|string'
        ]);

        $room = room::find($request->input('id'));

        if($request->input('rank') == 0){
            return redirect()->route('editar.habitacion',['id' => $room->id])->with([
                'error' => 'Debes Elegir un Rango para la Habitacion'
            ]);
        }
        
        $room->name = $request->input('name');
        $room->cost = $request->input('cost');
        $room->resume = $request->input('resume');
        $room->large_description = $request->input('large_description');

        if( is_null($request->input('img')) ){}else{
            $img = $request->file('img');
            $img_full = time().$img->getClientOriginalName();
            Storage::disk('rooms')->put($img_full, File::get($img));
            $room->img = $img_full;
        }

        if( $room->save() ){
            return redirect()->route('admin.habitaciones')->with([
                'message' => 'Habitacion Actualizada Correctamente!!'
            ]);
        }else{
            return redirect()->route('admin.habitaciones')->with([
                'error' => 'Error inesperado al actualizar la habitacion'
            ]);
        }
    }

    public function eliminarHabitacion(Request $request, $id){
        $room = room::find($id);

        $room->active = 0;

        if($room->save()){
            return redirect()->route('admin.habitaciones')->with([
                'message' => 'Habitacion Deshabilitada Correctamente'
            ]);
        }else{
            return redirect()->route('admin.habitaciones')->with([
                'error' => 'Error inesperado al deshabilitar la habitacion'
            ]);
        }
    }

    public function activarHabitacion(Request $request, $id){
        $room = room::find($id);

        $room->active = 1;

        if($room->save()){
            return redirect()->route('admin.habitaciones')->with([
                'message' => 'Habitacion Deshabilitada Correctamente'
            ]);
        }else{
            return redirect()->route('admin.habitaciones')->with([
                'error' => 'Error inesperado al deshabilitar la habitacion'
            ]);
        }
    }
}
