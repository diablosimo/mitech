<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Activite extends Model
{
    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function contenus(){
        return $this->hasMany('App\Contenu');
    }
    public function images(){
        return $this->hasMany('App\ActiviteImage');
    }

    public function users(){
        return $this->belongsToMany('App\User','participations');
    }

    public function departements(){
        return $this->belongsToMany('App\Departement','realisations');
    }
}
