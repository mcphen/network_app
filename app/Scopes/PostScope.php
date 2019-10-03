<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class PostScope implements Scope{

    public function apply(Builder $builder, Model $model){
        $builder->orderBy('created_at','ASC');
    }
}

