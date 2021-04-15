<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InvitadoPagesController extends Controller
{
    public function index(){
        return view('inicio');
    }
    public function habitaciones(){
        
        $habitaciones = DB::table('rooms')->get();
        return view('pages.habitaciones', [
            'habitaciones' => $habitaciones
        ]);
    }

    public function servicios(){

        $servicios = DB::table('services')->get();

        return view('pages.servicios',[
            'servicios' => $servicios
        ]);
    }
}
