<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function showLoginForm()
    {
        $home="login";
        return view('auth.login', compact('home'));
    }

    protected function credentials(Request $request)
    {
        //$field = $this->field($request);

        return [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
           'actived' => Users::ACTIVE,
        ];
    }

    public function redirectTo()
    {
       if(Auth::user()->first_connexion==0){
           return '/wizard/user';
       }
       return '/home';
    }

    public function field(Request $request)
    {
        $email = $this->username();

        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);

        $messages = ["{$this->username()}.exists" => 'The account you are trying to login is not activated or it has been disabled.'];

        $this->validate($request, [
            $this->username() => "required|exists:utilisateurs,{$field},actived," . Users::ACTIVE,
            'password' => 'required',
        ], $messages);
    }

    /*protected function authenticate(Request $request)
    {
        //dd($request); die();
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = $request->only('email', 'password');
        //var_dump($credentials); die();
        if(Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])){
            return '/home';
        }else{
            return '/login';
        }
    }*/


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
