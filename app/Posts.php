<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder as IlluminateBuilder;

//use App\Scopes\PostScope;

class Posts extends Model
{
  public $with = ['user','likes', 'comments', 'media'];
  protected $primaryKey = 'idposts';
  protected $fillable = [
      'description','users_idutilisateurs'
  ];

  public function user(){
    return $this->belongsTo('App\Users', 'users_idutilisateurs');
  }

  public function likes(){
    return $this->hasMany('App\Like');
  }

  public function comments(){
    return $this->hasMany('App\Comments');
  }

  public function media(){
    return $this->hasMany('App\MediaPost');
  }

  protected static function boot()
  {
      parent::boot();

      // Order by name ASC
      static::addGlobalScope('posts.created_at', function (IlluminateBuilder $builder) {
          $builder->orderBy('posts.created_at', 'asc');
      });
  }
}
