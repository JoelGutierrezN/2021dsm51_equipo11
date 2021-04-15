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
use App\Models\transaction;
use App\Models\countrie;
use App\Models\reservations_has_pets;
use App\Models\reservations_has_services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UserPagesController extends Controller
{
    public function index (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            $usuario = $request->session()->all();
            return view('user.index', [
                'usuario' => $usuario,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }
    public function habitaciones (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);
            
            $habitaciones = DB::table('rooms')->get();

            $usuario = $request->session()->all();
            return view('user.pages.habitaciones', [
                'usuario' => $usuario,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function reservar (Request $request, $dia) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);

            date_default_timezone_set('America/Mexico_City');

            if($dia == 1){
                $reservaciones = reservation::where('date', date('Y-m-d'))->get();
            }else{
                if($dia == 2){
                    $reservaciones = reservation::where('date', strtotime(date('Y-m-d')."+ 1 days"))->get();
                }else{
                    $reservaciones = reservation::where('date', strtotime(date('Y-m-d')."+ 2 days"))->get();      }
            }

            $habitaciones = room::get();

            $estadoHabitaciones =[];
            foreach($habitaciones as $habitacion){
                $estadoHabitaciones[$habitacion->id] = [
                    'id' => $habitacion->id, 
                    'active' => 1,
                    'rank' => $habitacion->rank
                ];
            }

            foreach($habitaciones as $habitacion){
                if($habitacion->active == 1){
                    foreach($reservaciones as $reservacion){
                        if($reservacion->room_id == $habitacion->id){
                            $estadoHabitaciones[$habitacion->id] = [
                                'id' => $habitacion->id, 
                                'active' => 0,
                                'rank' => $habitacion->rank
                            ];
                        }
                    }   
                }else{
                    $estadoHabitaciones[$habitacion->id] = [
                        'id' => $habitacion->id, 
                        'active' => 0,
                        'rank' => $habitacion->rank
                    ];
                }
            }

            $usuario = $request->session()->all();
            return view('user.pages.reservar', [
                'usuario' => $usuario,
                'estadoHabitaciones' => $estadoHabitaciones,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function getRoomImage($filename) {
        $file = Storage::disk('rooms')->get($filename);
        return new Response($file, 200);
    }

    public function servicios (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);

            $servicios = DB::table('services')->get();

            $usuario = $request->session()->all();
            return view('user.pages.servicios', [
                'usuario' => $usuario,
                'servicios' => $servicios,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function getServiceImage($filename) {
        $file = Storage::disk('services')->get($filename);
        return new Response($file, 200);
    }

    public function premium (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);

            $servicios = DB::table('services')->where('premium', 1)->get();

            $usuario = $request->session()->all();
            return view('user.pages.premium', [
                'usuario' => $usuario,
                'servicios' => $servicios,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }
    public function miCuenta (Request $request) {
        if($request->session()->get('session_id')){
            $user_id = $request->session()->get('session_id');
            $user = User::find($user_id);
            $usuario = $request->session()->all();
            $DatosUsuario = DB::table('users')->where('id', $usuario['session_id'])->first();

            return view('user.pages.config', [
                'user' => $user,
                'DatosUsuario' => $DatosUsuario,
                'usuario' => $usuario
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function mascotas (Request $request) {
        if($request->session()->get('session_id')){
            $id = $request->session()->get("session_id");
            $user = User::find($id);

            $pets = pet::where('user_id', $user->id)->get();
            
            $habitaciones = DB::table('rooms')->get();

            $usuario = $request->session()->all();

            return view('user.pages.mascotas', [
                'usuario' => $usuario,
                'pets' => $pets,
                'habitaciones' => $habitaciones,
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }
    }


    public function getPetImage($filename) {
        $file = Storage::disk('pets')->get($filename);
        return new Response($file, 200);
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
            'phone' => 'string|nullable',
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
                return redirect()->route('MiCuentaVU')->with(['message' => '¡Tu contraseña no coincide!']);
            }
        }

        if( $user->update() ){
            return redirect()->route('MiCuentaVU')->with(['message' => '¡Usuario Actualizado Correctamente!']);
        }else{
            return redirect()->route('MiCuentaVU')->with(['message' => '¡Ocurrio un Error al Guardar el Usuario!']);
        }
        
    }

    public function getImage($filename){
        
        $file = Storage::disk('users')->get($filename);
        
        return new Response($file, 200);
    }

    public function detalleHabitacion(Request $request,  $id){
        if($request->session()->get('session_id')){
            $user_id = $request->session()->get('session_id');
            $user = User::find($user_id);
            $usuario = $request->session()->all();
            $habitacion = room::find($id);
            $servicios = service::all();
            $direcciones = address::where('user_id', $user_id)->get();
            $pets = pet::where('user_id', $user_id)->get();

            return view('user.pages.rentar-habitacion', [
                'user' => $user,
                'habitacion' => $habitacion,
                'usuario' => $usuario,
                'servicios' => $servicios,
                'direcciones' => $direcciones,
                'pets' => $pets
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function guardarMascota (Request $request){
        $validate = $this->validate($request,[
            'name' => 'required|string',
            'race' => 'required|string',
            'img' => 'required|image'
        ]);

        $pet = new pet();

        $user_id = $request->session()->get('session_id');

        if( is_null( $request->img )){
            return redirect()->route('mascotasVU')->with(['message' => 'Es Necesario una foto del perrito']);
        }else{
            $img = $request->file('img');
            $img_full = time().$img->getClientOriginalName();
            Storage::disk('pets')->put($img_full, File::get($img));
            $pet->img = $img_full;    
        }

        $pet->name = $request->input('name');
        $pet->race = $request->input('race');
        $pet->observations = $request->input('observations');
        $pet->user_id = $user_id;

        if( $pet->save() ){
            return redirect()->route('mascotasVU')->with(['message' => 'Tu perrito se ah registrado correctamente']);
        }else{
            return redirect()->route('mascotasVU')->with(['message' => 'Error inesperado al registrar a tu perrito']);
        }
    }

    public function direcciones(Request $request){
        if($request->session()->get('session_id')){
            $user_id = $request->session()->get('session_id');

            $user = user::find($user_id);
            $usuario = $request->session()->all();
            $direcciones = address::where('user_id', $user_id)->paginate(7);
            $estados = state::get();

            return view('user.pages.direcciones', [
                'user' => $user,
                'usuario' => $usuario,
                'direcciones' => $direcciones,
                'estados' => $estados
            ]);

        }else{
            return redirect()->route('login');
        }
    }

    public function getMunicipios(Request $request, $state_id){
            $municipios = countrie::where('state_id', $state_id)->get();
            if( count($municipios) >= 1){
                foreach ( $municipios as $municipio ) {
                    $municipioshelp[$municipio->id] = $municipio->name;
                }
            }
            
            $municipios = json_encode($municipioshelp);
            return new Response($municipios);
    }

    public function guardarDireccion(Request $request){

        $user_id = $request->session()->get('session_id');
        $user = user::find($user_id);

        $validate = $this->validate($request,[
            'street' => 'required|string',
            'number' => 'required|numeric',
            'number_int' => 'numeric|nullable',
            'suburb' => 'required|string',
            'state_id' => 'required|numeric',
            'country_id' => 'required|numeric'
        ]);

        $address = new address();

        $address->street = $request->input('street');
        $address->number = $request->input('number');
        $address->number_int = $request->input('number_int');
        $address->suburb = $request->input('suburb');
        $address->state_id = $request->input('state_id');
        $address->country_id = $request->input('country_id');
        $address->user_id = $user_id;

        if( $address->save() ){
            return redirect()->route('direccionesVU')->with([
                'message' => 'Direccion Agregada Correctamente'
            ]);
        }else{
            return redirect()->route('direccionesVU')->with([
                'message' => 'Error inesperado al guardar la direccion'
            ]);
        }
    }

    public function reservarPago(Request $request){
        $validate = $this->validate($request, [
            'pets' => 'required',
            'services' => 'required',
            'dates' => 'required',
            'card' => 'required',
            'cvv' => 'required',
            'card_date' => 'required',
            'owner_name' => 'required'
        ]);
        
        $reservation = new reservation();
        
        $dates = $request->input('dates');
        $date_left = end($dates);
        
        $homeservice = $request->input('homeservice');

        if(is_null($homeservice)){}else{
            $reservation->homeservice = $request->input('homeservice');
        }

        $reservation->date = date('Y-m-d');
        $reservation->date_start = $dates['0'];
        $reservation->date_left = $date_left;
        $reservation->subtotal = $request->input('subtotal');
        $reservation->total = $request->input('total');
        $reservation->address_id = $request->input('address_id');
        $reservation->room_id = $request->input('room_id');
        $reservation->user_id = $request->session()->get('session_id');

        $reservation->save();

        $reservation_new = reservation::where('user_id', $request->session()->get('session_id'))->orderBy('id','desc')->first();
        $pets = $request->input('pets');
        $reservation_has_pet = new reservations_has_pets();
        foreach($pets as $pet){
            $reservation_has_pet->reservation_id = $reservation_new->id;
            $reservation_has_pet->pet_id = $pet;
            $reservation_has_pet->save();
        }
        $reservation_has_services = new reservations_has_services();
        $services = $request->input('services');
        foreach($services as $service){
            $reservation_has_services->reservation_id = $reservation_new->id;
            $reservation_has_services->service_id = $service;
            $reservation_has_services->save();
        }

        $transaction = new transaction();

        $transaction->card = $request->input('card');
        $transaction->card_date = $request->input('card_date');
        $transaction->cvv = $request->input('cvv');
        $transaction->owner_name = $request->input('owner_name');
        $transaction->date = date('Y-m-d');
        $transaction->invoice = Str::random(15);
        $transaction->reservation_id = $reservation_new->id;

        $transaction->save();

        $room = room::find($reservation->room_id);

        $room->active = 0;
        return redirect()->route('MiCuentaVU')->with([
            'message' => 'Reservacion Creada Correctamente'
        ]);

    }
    
}
