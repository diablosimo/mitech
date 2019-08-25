<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Contact extends Model
{

    use SoftDeletes;

    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
