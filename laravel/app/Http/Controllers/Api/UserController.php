<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Mail\UserCreation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = Str::random(8);
        
        $user = new User();

        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->rank = $request->input('rank');
        $user->active = $request->input('active');
        $user->cellphone = $request->input('cellphone');
        $user->password = bcrypt($password);

        $data = new User();
        $data->password = $password;
        $data->email = $user->email;
        $data->name = $user->name;
        $data->first_name = $user->first_name;

        $correo = new UserCreation($data);
        Mail::to('$user->email')->send($correo);
        
        return response()->json($user->save());
    }

    public function registrar(Request $request)
    {
        $user = new User;

        $request->validate([
            'name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cellphone' => 'required',
            'phone' => 'nullable',
            'rank' => 'nullable',
        ]);

        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->cellphone = $request->input('cellphone');
        $user->first_name = $request->input('first_name');
        $user->password = bcrypt($request->input('password'));
        
        if( $user->save() ){
            return response()->json($user->name.' '.$user->first_name.' Bienvenido a SafetyDogs. Ahora puedes iniciar sesion', 200);
        }else{
            return response()->json($user->name.'Error inesperado al registrar al hacer tu registro contacta a support@safetydogs.online', 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        
        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->cellphone = $request->input('cellphone');
        $user->phone = $request->input('phone');
        $user->rank = $request->input('rank');
        $user->email = $request->input('email');

        if($request->input('active') == "Activo"){
            $user->active = 1;
        }else{
            if($request->input('active') == "Inactivo"){
                $user->active = 0;
            }
        }

        return response()->json($user->save());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        return new UserCollection(User::all());
    }
}
