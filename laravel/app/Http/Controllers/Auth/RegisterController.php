<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function guardar(Request $request){
        // dd('entro');
        $request->validate([
            'name' => 'required|string|max:25',
            'first_name' => 'required|string|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cellphone' => 'required',
            'phone' => '',
            'rank' => '',
        ]);
        $request->merge([
            'password' => bcrypt($request->password)
        ]);
        
        $user = User::create($request->all());
        return redirect()->route('login');
    }
}
