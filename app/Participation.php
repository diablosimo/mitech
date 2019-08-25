<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;



class Participation extends Model
{
    use HasCompositePrimaryKey;
    protected $primaryKey=array('user_id','activite_id');
}
