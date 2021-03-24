<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\image;
use App\Models\like;
use App\Models\comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LikesController extends Controller
{
    public function like($image_id, Request $request){

        

        $user_id = $request->session()->get("session_id");
        $user = User::find($user_id);

        $isset_like = like::where('user_id', $user->id)->where('image_id', $image_id)->get()->count();

        if( $isset_like == 0){
            $like = new like;

            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;

            $like->save();

            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }
    }

    public function dislike($image_id, Request $request){
        $user_id = $request->session()->get("session_id");
        $user = User::find($user_id);
        $like = like::where('user_id', $user->id)->where('image_id', $image_id)->first();

        if( $like ){

            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => "Se ah dado dislike correctamente"
            ]);
        }else{
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }
    }
}
