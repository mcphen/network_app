<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserActivate;
use App\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;


use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $redirectTo = '/home';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $home="register";
        return view('auth.register', compact('home'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateurs'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $pics = "boy.png";
        if($data['genre']=="femme"){
            $pics = "girl.png";
        }
        $user=Users::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'date_naissance' => $data['date_naissance'],
            'genre' => $data['genre'],
            'pics'=>$pics,
            'banniere'=>'banniere.jpg',
            'promotion_id' => $data['promotion'],
            'role_id' => 2,
            'actived' => 0,
            'remember_token'=>Str::random(40) . time(),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_connexion'=>0
        ]);

       // $user->notify(new UserActivate($user));

        return $user;

        // back()->with('success','Votre inscription a été effectuée avec succès, Nos admistrateurs vous enveront un mail de confirmation.');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')
            ->with(['success' => 'Felicitation! Votre demande d\'adhesion a bien été effectuée. Nos administrateurs vérifieront votre dossier et vous enverront un mail pour activer votre compte afin de vous connecter. Merci!']);
    }

    /**
     * @param $token
     */
    public function activate($token = null)
    {
        $user = Users::where('token', $token)->first();

        if (empty($user)) {
            return redirect()->to('/')
                ->with(['error' => 'Your activation code is either expired or invalid.']);
        }

        $user->update(['token' => null, 'active' => Users::ACTIVE]);

        return redirect()->route('login')
            ->with(['success' => 'Congratulations! your account is now activated.']);
    }
}
