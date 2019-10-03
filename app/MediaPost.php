<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaPost extends Model
{
    protected $table = 'media_post';
    protected $fillable = [
        'libelle_media_post', 'posts_idposts'
    ];

    public function getLibelleMediaPostAttribute($pics){
        return asset('/img/'.$pics);
    }
}
