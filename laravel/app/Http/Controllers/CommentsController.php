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

    public function delete(Request $request, $id){
        $user_id = $request->session()->get("session_id");
        $user = user::find($user_id);
        $comment = comment::find($id);

        if( $user && $comment->user_id == $user->id || $comment->image->user_id == $user->id){
            if( $comment->delete() ){
                return redirect()->route('detalle.publicacion', ['id' => $comment->image->id])
                                 ->with([
                                     'message' => 'Comentario Eliminado Correctamente',
                                     'user' => $user
                                 ]);
            }else{
                return redirect()->route('detalle.publicacion', ['id' => $comment->image->id])
                                 ->with([
                                     'user' => $user,
                                     'message' => 'Error Inesperado al momento de eliminar el comentario'
                                 ]);
            }
        }else{
            return redirect()->route('detalle.publicacion', ['id' => $comment->image->id])
                            ->with([
                                'user' => $user,
                                'message' => 'No Puedes Eliminar Comentarios Ajenos'
                            ]);
        }
    }
}
