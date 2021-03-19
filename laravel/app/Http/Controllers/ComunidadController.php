<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ComunidadController extends Controller
{
    public function comunidad (Request $request){
        $usuario = $request->session()->all();

        $images = image::orderBy('id', 'desc')->get();

        return view('user.pages.comunidad',[
            'usuario' => $usuario,
            'images' => $images
        ]);
    }

    public function saveimage(Request $request){

        $images = image::orderBy('id', 'desc')->get();

        $usuario = $request->session()->all();

        $validate = $this->validate($request,[
            'image_path' => 'required|image',
            'description' => 'required|string'
        ]);
        
        $description = $request->input('description');

        $image = new image;

        $image->user_id = $usuario['session_id'];
        $image->description = $description;

        if( $request->file('image_path') ){
            $image_path = $request->file('image_path');
            $img_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($img_path_name, File::get($image_path));
            $image->image_path = $img_path_name;    
        }else{
            return redirect()->route('comunidadVU')->with([
                'usuario' => $usuario,
                'images' => $images,
                'message' => 'No hay una imagen correcta para guardar'
            ]);
        }

        if( $image->save() ){

            return redirect()->route('comunidadVU')->with([
                'usuario' => $usuario,
                'images' => $images,
                'message' => 'Publicacion Creada Correctamente'
            ]);

        }else{
            return redirect()->route('comunidadVU')->with([
                'usuario' => $usuario,
                'images' => $images,
                'message' => 'Error al Generar la Publicacion'
            ]);
        }
    }
}
