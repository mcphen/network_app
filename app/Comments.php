<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public $with = ['user'];
    protected $fillable = [
        'users_idutilisateurs', 'posts_idposts','comment'
    ];

    public function user(){
        return $this->belongsTo('App\Users', 'users_idutilisateurs');
    }
}
