<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipationController extends Controller
{
    public static function participe($idActivite)
    {
        $activite = Activite::find($idActivite);
        if ($activite) {
            $user = Auth::user();
            if ($user) {
                $participations = Participation::all()->where('user_id', $user->id)->where('activite_id', $idActivite)->count();
                if ($participations == 0) {
                    if ($activite->nb_place > $participations) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return null;
            }
        } else {
            abort('404');
        }

    }

    public function store(Request $request)
    {
        $activite = Activite::find($request->participate);
        if ($activite) {
            $participation = new Participation();
            $participation->user_id = Auth::user()->id;
            $participation->activite_id = $request->participate;
            $participation->save();
            return redirect('activites/'.$request->participate);
        }
        return redirect('/');
    }
}
