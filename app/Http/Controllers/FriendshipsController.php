<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Notifications\NewFriendRequest;
use App\Notifications\FriendRequestAccepted;

class FriendshipsController extends Controller
{
    /**
     * Liste des amis d'un utilisateur
     */
    public function view_network(){
        
        $title = "Recherche | Reseau des Anciens du Lycee Classes Renforcées";
        return view('profile.search_friend')->with([ 'title'=>$title]);

    }

    public function is_friend(){
        return Auth::user()->friends();
    }

    public function sendFriend($user_id){
        //echo $user_id;
        
        $res= Auth::user()->addFriend($user_id);
        Users::find($user_id)->notify(new NewFriendRequest(Auth::user()));

        $users =  Users::where('idutilisateurs','=', $user_id)
                    ->where('actived',1)
                    ->get();
        foreach( $users as &$row) {
           
            $row->status = 1;
        }
        return $row;
    }

    public function connection_network(){
        $users =  Users::where('idutilisateurs','!=', Auth::user()->idutilisateurs)
                    ->where('actived',1)
                    ->get();
        $network = array();

        foreach($users as $user){
            $user->status = 0;
            if(!Auth::user()->has_pending_friend_request_sent_to($user->idutilisateurs) AND !Auth::user()->has_pending_friend_request_from($user->idutilisateurs) AND Auth::user()->is_friends_with($user->idutilisateurs)!=1){
                array_push($network, $user);
            }
        }

        return $network;
    }

    
    
    public function check($id){
        if(Auth::user()->is_friends_with($id)===1){
    
            return [ "status"=> "amis"];
        }

        if(Auth::user()->has_pending_friend_request_from($id)){
            return [ "status"=> "pending"];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id)){
            return [ "status"=> "waiting"];
        }

        return ["status" => 0];


    }

    public function acceptFriend($id){
        $resp =  Auth::user()->accept_friend($id);
        Users::find($id)->notify(new FriendRequestAccepted(Auth::user()));
        //return $res;
        return $resp;
    }

    public function friends(){

        $uid = Auth::user()->idutilisateurs;
        $title = "Resaux | Reseau des Anciens du Lycee Classes Renforcées";
        return view('profile.findFriends')->with(['title'=>$title]);
    }

}
