<?php

namespace App;

use App\Notifications\ApprouveAdherentNotification;
use App\Notifications\ApprouvePartenaireNotification;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use RevisionableTrait;
    protected $revisionCreationsEnabled = true;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adherent(){
        return $this->hasOne('App\Adherent');
    }

    public function partenaire(){
        return $this->hasOne('App\Partenaire');
    }

    public function admin(){
        return $this->hasOne('App\Admin');
    }

    public function activites(){
        return $this->belongsToMany('App\Activite','participations');
    }

    public static function isClient(){
        $adherent=Adherent::all()->where('user_id',Auth::user()->id)->isNotEmpty();
        $partenaire=Partenaire::all()->where('user_id',Auth::user()->id)->isNotEmpty();
        if(!$partenaire and !$adherent){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendApprouveAdherentNotification($name,$email)
    {
        $this->notify(new ApprouveAdherentNotification($name,$email));
    }
    public function sendApprouvePartenaireNotification($nameRespo,$name,$formeJuridique,$email)
    {
        $this->notify(new ApprouvePartenaireNotification($nameRespo,$name,$formeJuridique,$email));
    }
}
