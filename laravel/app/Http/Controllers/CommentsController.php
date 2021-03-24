<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\image;
use App\Models\comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CommentsController extends Controller
{
    public function saveComment (Request $request){

        $user_id = $request->session()->get("session_id");
        $image_id = $request->input('image_id');
        $content = $request->input('content');
        
        $validate = $this->validate($request,[
            'image_id' => 'integer|required',
            'content' => 'required|string'
        ]);

        $comment = new comment();

        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        if( $comment->save() ){
            return redirect()->route('detalle.publicacion', ['id' => $image_id,])->with([
                'message' => 'Comentario Publicado Correctamente'
            ]);
        }else{
            return redirect()->route('detalle.publicacion', ['id' => $image_id])->with([
                'message' => 'Error Inesperado al Intentar Guardar la Publicacion'
            ]);
        }
    }
}
