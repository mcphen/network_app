<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $with = ['user'];
    protected $primaryKey = 'idlikes';
    protected $fillable = [
        'users_idutilisateurs', 'posts_idposts'
    ];

    

    public function user(){
        return $this->belongsTo('App\Users', 'users_idutilisateurs');
    }
}
