<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Departement extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function adherents(){
        return $this->belongsToMany('App\Adherent','appartenances');
    }

    public function bureauMemeber(){
        return $this->belongsTo('App\BureauMember','bureau_member_id');
    }

    public function activites(){
        return $this->belongsToMany('App\Activite','realisations');
    }
}
