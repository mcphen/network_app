<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'idmessages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_from','user_to','conversation_id', 'message','status'
    ];


   public function fromContact()
   {
       return $this->hasOne(Users::class, 'idutilisateurs', 'from');
   }
}
