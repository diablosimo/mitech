<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Partenaire extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function formeJuridique(){
        return $this->belongsTo('App\FormeJuridique');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
