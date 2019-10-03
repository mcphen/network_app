<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like($id){
        $post =  Posts::find($id);

        $like = Like::create([
            'users_idutilisateurs'=>Auth::user()->idutilisateurs, 
            'posts_idposts'=>$post->idposts
        ]);

        return Like::find($like->idlikes);
    }

    public function unlike($id){
        $post =  Posts::find($id);
        Like::where('users_idutilisateurs',Auth::user()->idutilisateurs)
        ->where('posts_idposts',$post->idposts)
        ->first()
        ->delete();

        return 1;
    }
}
