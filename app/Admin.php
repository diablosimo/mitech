<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Admin extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function actualites(){
        return $this->hasMany('App\Actualite');
    }

    public function contact(){
        return $this->hasMany('App\Contact');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
