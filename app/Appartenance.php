<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class Appartenance extends Model
{
    use SoftDeletes;
    use HasCompositePrimaryKey;
    protected $primaryKey=array('departement_id','adherent_id');

}
