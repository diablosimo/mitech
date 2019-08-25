<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Adherent extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function departements(){
        return $this->belongsToMany('App\Departement','appartenances');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function bureauMember(){
        return $this->hasOne('App\BureauMember');
    }
}
