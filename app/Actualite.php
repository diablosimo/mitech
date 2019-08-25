<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Actualite extends Model
{

    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;


    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
