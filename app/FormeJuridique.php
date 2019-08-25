<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class FormeJuridique extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function partenaires(){
        return $this->hasMany('App\Partenaire');
    }

    public function withTrashedPartenaires(){
        return $this->hasMany('App\Partenaire')->withTrashed();
    }
}
