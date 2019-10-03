<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Users extends Authenticatable
{
    use Notifiable;

    use Friendable;


    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $table = 'utilisateurs';

    protected $primaryKey = 'idutilisateurs';

    public $with = ['promotion'];



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom','date_naissance', 'genre','email','password','promotion_id','actived','role_id', 'pics', 'banniere','remember_token', 'first_connexion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function posts(){
      return $this->hasMany('App\Posts');
    }

    public function promotion(){
        return $this->belongsTo('App\Promotions', 'promotion_id');
    }

   
    

    public function getPicsAttribute($pics){
        return asset('/img/'.$pics);
    }

    
}
