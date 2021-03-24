<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserPagesController extends Controller
{
    public function index (Request $request) {
        $id = $request->session()->get("session_id");
        $user = User::find($id);
        $usuario = $request->session()->all();
        return view('user.index', [
            'usuario' => $usuario,
            'user' => $user
        ]);
    }
    public function reservaciones (Request $request) {
        $id = $request->session()->get("session_id");
        $user = User::find($id);
        
        $habitaciones = DB::table('rooms')->get();

        $usuario = $request->session()->all();
        return view('user.pages.reservaciones', [
            'usuario' => $usuario,
            'habitaciones' => $habitaciones,
            'user' => $user
        ]);
    }
    public function servicios (Request $request) {
        $id = $request->session()->get("session_id");
        $user = User::find($id);

        $servicios = DB::table('services')->get();

        $usuario = $request->session()->all();
        return view('user.pages.servicios', [
            'usuario' => $usuario,
            'servicios' => $servicios,
            'user' => $user
        ]);
    }
    public function premium (Request $request) {
        $id = $request->session()->get("session_id");
        $user = User::find($id);

        $servicios = DB::table('services')->where('premium', 1)->get();

        $usuario = $request->session()->all();
        return view('user.pages.premium', [
            'usuario' => $usuario,
            'servicios' => $servicios,
            'user' => $user
        ]);
    }
    public function contacto (Request $request) {
        $id = $request->session()->get("session_id");
        $user = User::find($id);

        $usuario = $request->session()->all();
        return view('user.pages.premium', [
            'usuario' => $usuario,
            'user' => $user
        ]);
    }
<<<<<<< HEAD

    public function config(Request $request){
        $id = $request->session()->get("session_id");
        $user = User::find($id);

        $usuario = $request->session()->all();

        $DatosUsuario = DB::table('users')->where('id', $usuario['session_id'])->first();

        return view('user.pages.config', [
            'usuario' => $usuario,
            'DatosUsuario' => $DatosUsuario,
            'user' => $user
        ]);
    }

    public function update(Request $request){
        
        $usuario = $request->session()->all();

        $id = $usuario['session_id'];
        $name = $request->input('name');
        $first_name = $request->input('first_name');
        $email = $request->input('email');
        $cellphone = $request->input('cellphone');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        

        $user = User::find($id);

        $validate = $this->validate($request,[
            'name' => 'required|string',
            'first_name' => 'required|string',
            'phone' => 'string',
            'cellphone' => 'required|string'
        ]);

        if( is_null( $request->img )){
        }else{
            $img = $request->file('img');
            $img_full = time().$img->getClientOriginalName();
            Storage::disk('users')->put($img_full, File::get($img));
            $user->img = $img_full;    
        }

        $data = [];

        Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $name;
        $user->first_name = $first_name;
        $user->email = $email;
        $user->cellphone = $cellphone;
        $user->phone = $phone;
        

        //dd($user);
        if( is_null($new_password) ){}else{
            if( Hash::check( $password, $user->password ) ){
                $user->password = bcrypt($new_password);
            }else{
                return redirect()->route('configVU')->with(['message' => '¡Tu contraseña no coincide!']);
            }
        }

        if( $user->update() ){
            return redirect()->route('configVU')->with(['message' => '¡Usuario Actualizado Correctamente!']);
        }else{
            return redirect()->route('configVU')->with(['message' => '¡Ocurrio un Error al Guardar el Usuario!']);
        }
        
    }

    public function getImage($filename){
        
        $file = Storage::disk('users')->get($filename);
        
        return new Response($file, 200);
    }
=======
>>>>>>> parent of 172b006 (avances foro)
}
