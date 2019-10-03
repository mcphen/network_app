<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Friendship;
use App\Messages;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function myprofil($id){
        $title = "Mon profil | Reseau des Anciens du Lycee Classes Renforcées";
        return view('profile.my_profil')->with(['title'=>$title,'user_id'=>$id]);
    }

    
    public function messages(){
      $title = "Messages | Reseau des Anciens du Lycee Classes Renforcées";
        return view('profile.message')->with(['title'=>$title]);
    }

    public function requestFriends(){
      $title = "Resaux | Reseau des Anciens du Lycee Classes Renforcées";
        $uid = Auth::user()->idutilisateurs;
        $friendRequest = DB::table('friendship')
            ->rightJoin('utilisateurs','utilisateurs.idutilisateurs','=','friendship.requester')
            ->join('promotion', 'promotion.idpromotion', '=', 'utilisateurs.promotion_id')
            ->where('friendship.user_requested','=',$uid)->get();

        return view('profile.requestFriends')->with(['friend'=> $friendRequest, 'title'=>$title]);

    }

    

    



    /**
     * @param $idconversation
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     * affiche le dernier message
     */

    public function lastMessage($idconversation){
        $message = DB::table('messages')
            ->where('conversation_id','=',$idconversation)
            ->latest()
            ->first();
        return $message;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * affiche la liste des utilisateurs qui envoient des messages à l'utilisateur connecte
     */
    public function getMessages(){

        $res = array();
        $i=0;
        $allUsers = \Illuminate\Support\Facades\DB::table('utilisateurs')
            ->where('idutilisateurs','!=',\Illuminate\Support\Facades\Auth::user()->idutilisateurs)
            ->get();

        foreach ($allUsers as $item){
            $convUser = \Illuminate\Support\Facades\DB::table('conversation')
                ->where('user_one','=',$item->idutilisateurs)
                ->orWhere('user_two','=',$item->idutilisateurs)
                ->get();
            foreach ($convUser as $c){
                if($c->user_one== $item->idutilisateurs || $c->user_two==$item->idutilisateurs){
                    $res[$i] = array(
                      'first'=>$item,
                      'second'=>$this->lastMessage($c->idconversation),
                      'unread'=>$this->read_message(Auth::user()->idutilisateurs)) ;
                    $i++;
                }
            }
            /*if($convUser){

            }*/

        }


        return response()->json($res);
    }

    /**
     * @param $user_from
     * @param $user_to
     * @return int
     * Fonction permettant d'afficher le nombre de message non lu
     */

    public function read_message($user_from){
      $message = DB::table('messages')
          ->where('user_to','=',$user_from)

                  ->where('status','=',0)
          ->get();
          //var_dump($message);
      return count($message);
    }

    public function update_status_message($idconversation){
      DB::table('messages')
            ->where('conversation_id', $idconversation)
            ->where('status', 0)
            ->update(['status' => 1]);
    }

    /**
     * @param $idconversation
     * @return \Illuminate\Http\JsonResponse
     * Fonction permettant d'afficher les messages par rapport à une conversation
     */
    public function getConversation($idconversation){
        $user = array(); // tableau des utilisateurs
        $res = array(); //  tableau resultat

        //affiche un tableau de la table conversation
        $conversation = DB::table('conversation')
            ->where('idconversation','=',$idconversation)
            ->first();

        //affiche les messages d'une conversation
        $message = DB::table('messages')
            ->where('conversation_id','=',$idconversation)->orderBy('idmessages', 'ASC')
            ->get();


        if($conversation->user_one != Auth::user()->idutilisateurs){
            $user = DB::table('utilisateurs')
                ->where('idutilisateurs','=',$conversation->user_one)
                ->first();
        }elseif ($conversation->user_two != Auth::user()->idutilisateurs){
            $user = DB::table('utilisateurs')
                ->where('idutilisateurs','=',$conversation->user_two)
                ->first();
        }

        $res = array('first'=>$user,'second'=>$message);



        return response()->json($res);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Fonction permettant d'envoyer des messages
     */

    public function sendMsg(Request $request){
        /* echo $request->get('message_input')."</br>";
         echo $request->get('userTo')."</br>";
         echo $request->get('convID')."</br>*/
        $message= $request->get('message_input');
        $userTo = $request->get('userTo');
        $convID = $request->get('convID');
        //event(new ChatEvent($message,Users::find(Auth::user()->idutilisateurs)));
         /*DB::table('messages')->insert(
             ['user_from' => Auth::user()->idutilisateurs,
                 'message'=>$request->get('message_input'),
                 'user_to'=>$request->get('userTo'),
                 'conversation_id'=>$request->get('convID'),
                 'status'=>false,
             ]
         );*/
         $t = Messages::create([
           'user_from' => Auth::user()->idutilisateurs,
               'message'=>$message,
               'user_to'=>$userTo,
               'conversation_id'=>$convID,
               'status'=>false,
         ]);
         event(new ChatEvent($t));
         return response()->json($t);
    }

    /**
     * @return mixed
     * Fonction de test
     */
    public function test(){
        $t = Messages::create([
          'user_from' => Auth::user()->idutilisateurs,
              'message'=>"hola",
              'user_to'=>26,
              'conversation_id'=>1,
              'status'=>false,
        ]);
        event(new ChatEvent($t));
        return $t;
       // event();
    }
}
