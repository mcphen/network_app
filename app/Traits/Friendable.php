<?php

namespace App\Traits;
use App\Friendship;

trait Friendable{

    public function test(){
        echo 'hi';
    }

    public function addFriend($user_id){

        if($this->idutilisateurs === $user_id)
		{
			return 0;
		}
		if($this->is_friends_with($user_id) === 1)
		{
			return "already friends";
		}
		if($this->has_pending_friend_request_sent_to($user_id) === 1)
		{
			return "already sent a friend request";
		}
		if($this->has_pending_friend_request_from($user_id) === 1)
		{
			return $this->accept_friend($user_id);
        }
        
        $friendship = Friendship::create([
            'requester' => $this->idutilisateurs,
            'user_requested'=>$user_id,
            'statut'=>False
        ]);

        if($friendship){
             return $friendship;
        }

        return 0; 
    }

    public function accept_friend($requester){

        if($this->has_pending_friend_request_from($requester) === 0)
		{
			return 0;
		}
        $friendship = Friendship::where('requester',$requester)
                                ->where('user_requested', $this->idutilisateurs)
                                ->first();
        
        if($friendship){
            $friendship->update([
                'statut'=>True,
            ]);

            return 1;
        }
        return 0;
    }

    public function friends(){
        $friends = array();

        $f1= Friendship::where('statut',1)
                        ->where('requester',$this->idutilisateurs)
                        ->get();

        foreach($f1 as $friendship){
            array_push($friends, \App\Users::find($friendship->user_requested));
        }

        $friends2 = array();

        $f2 = Friendship::where('statut',1)
                        ->where('user_requested',$this->idutilisateurs)
                        ->get();
        
        foreach($f2 as $friendship){
            array_push($friends2, \App\Users::find($friendship->requester));
        }

        return array_merge($friends, $friends2);


    }

    public function pending_friend_requests(){
        $users= array();

        $friendships = Friendship::where('statut',0)
                        ->where('user_requested',$this->idutilisateurs)
                        ->get();

        foreach($friendships as $friendship){
            array_push($users, \App\Users::find($friendship->requester));
        }

        return $users;
    }

    public function friends_is(){
        return collect($this->friends())->pluck('idutilisateurs');
    }

    public function is_friends_with($user_id){
        if(in_array($user_id, $this->friends_is()->toArray())){
            return 1;
        }else{
            return 0;
        }
    }

    public function pending_friend_requests_ids()
	{
		return collect($this->pending_friend_requests())->pluck('idutilisateurs')->toArray();
	}
	public function pending_friend_requests_sent()
	{
		$users = array();
		$friendships = Friendship::where('statut', 0)
						->where('requester', $this->idutilisateurs)
						->get();
		foreach($friendships as $friendship):
			array_push($users, \App\Users::find($friendship->user_requested));
		endforeach;
		return $users;
	}
	public function pending_friend_requests_sent_ids()
	{
		return collect($this->pending_friend_requests_sent())->pluck('idutilisateurs')->toArray();
	}
	public function has_pending_friend_request_from($user_id)
	{
		if(in_array($user_id, $this->pending_friend_requests_ids()))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function has_pending_friend_request_sent_to($user_id)
	{
		if(in_array($user_id, $this->pending_friend_requests_sent_ids()))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}


}