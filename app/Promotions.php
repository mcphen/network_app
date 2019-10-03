<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'idpromotion';
    protected $fillable = [
      'libelle_promotion',
    ];
}
