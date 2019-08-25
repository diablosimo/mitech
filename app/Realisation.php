<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class Realisation extends Model
{
    use HasCompositePrimaryKey;
    protected $primaryKey=array('departement_id','activite_id');
}
