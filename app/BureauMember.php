<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class BureauMember extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function adherent(){
        return $this->belongsTo('App\Adherent');
    }

    public function departement(){
        return $this->hasOne('App\Departement');
    }
}
