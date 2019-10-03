<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;
use App\Notifications\NewFriendRequest;
use App\Users;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo count(Auth::user()->friends()); die();
        //echo Auth::user()->promotion->libelle_promotion; die();
        $title = "Accueil | Reseau des Anciens du Lycee Classes Renforcées";
        return view('home')->with(['title'=> $title]);
    }


    public function notifications(){
        $title = "Notifications | Reseau des Anciens du Lycee Classes Renforcées";
        Auth::user()->unreadNotifications->markAsRead();

        return view('notifications')->with(['nots'=> Auth::user()->notifications,'title'=>$title]);
    }

    function sendEmail(){
        //dispatch(new SendEmail());

        $user_id = 26;

        $res= Auth::user()->addFriend($user_id);
        Users::find($user_id)->notify(new NewFriendRequest(Auth::user()));
         
            return 'A message has been sent to Mailtrap!';
    }

}
