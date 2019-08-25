<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function redirectToCompte(){
        $adherent=Adherent::with('user.activites.categorie')->withTrashed()->where('user_id',Auth::user()->id)->first();
        $partenaire=Partenaire::with('user')->where('user_id',Auth::user()->id)->first();
        if($adherent){
            return view('user.adherent',['adherent'=>$adherent]);
        }elseif ($partenaire){
            return view('user.partenaire',['partenaire'=>$partenaire]);
        }else{
           return abort('404');
        }
    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
    }
}
