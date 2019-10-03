<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Posts;
use App\Comments;
use Illuminate\Support\Str;
use App\MediaPost;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postfeed(){
       
        $friends = Auth::user()->friends();
        $feed = array();
        foreach(Auth::user()->posts as $post):
            $post->statuts = false;
            array_push($feed, $post);
        endforeach;
        foreach($friends as $friend):
                foreach($friend->posts as $post):
                    $post->statuts = false;
                    array_push($feed, $post);
                endforeach;
        endforeach;

        usort($feed, function($p1, $p2){

            return $p1->idposts > $p2->idposts;
        });

      
        
        
        return $feed;
    }

    public function saveImg(Request $request){
        $imgs = $request->get('image');

        $post =  Posts::create([
            'users_idutilisateurs' => Auth::user()->idutilisateurs,
            'description'=>$request->description,
        ]);
  
        

        //remove extra partb 
        foreach($imgs as $img){

            $exploded = explode(',', $img);

            if(str_contains($exploded[0], 'gif')){
                $ext = 'gif';

            }elseif(str_contains($exploded[0], 'jpg')){
                $ext = 'jpg';
            }elseif(str_contains($exploded[0], 'jpeg')){
                $ext = 'jpeg';
            }elseif(str_contains($exploded[0], 'png')){
                $ext = 'png';
            }

            $decode = base64_decode($exploded[1]);

            $filename = Str::random().'.'.$ext;

            $path = \public_path()."/img/".$filename;

            file_put_contents($path, $decode);

            MediaPost::create([
                'libelle_media_post'=>$filename,
                'posts_idposts'=>$post->idposts
            ]);


        }

        return Posts::find($post->idposts);
        

    }

    public function addPost(Request $request){

      $post =  Posts::create([
          'users_idutilisateurs' => Auth::user()->idutilisateurs,
          'description'=>$request->description,
      ]);

      return Posts::find($post->idposts); 

    }

    public function testPost(){
        $var =  Posts::find(23);
        dd($var);
    }

    public function deletePost($id){
        $post = Posts::find($id);
        $post->delete();
    }

    public function sendCommentaire(Request $request){
       
        $message= $request->get('message_input');
       
        $postID = $request->get('postID');
        
         $t = Comments::create([
           'users_idutilisateurs' => Auth::user()->idutilisateurs,
               'comment'=>$message,
               
               'posts_idposts'=>$postID,
         ]);
         //event(new ChatEvent($t));

         $res= Comments::find($t->id);
         return response()->json($res);
    }
}
