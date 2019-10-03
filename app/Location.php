<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'localisation';

    protected $primaryKey = 'idlocalisation';

    protected $fillable = [
         'user_id', 'pays_id','ville'
    ];
}
