<?php

namespace App\Http\Controllers;

use App\Activite;
use App\ActiviteImage;
use App\Categorie;
use App\Departement;
use App\Http\Requests\ActiviteRequest;
use App\Participation;
use App\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ActiviteController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        $categories = Categorie::all();
        return view('admin.activite.search', ['departements' => $departements, 'categories' => $categories]);
    }

    public function findByCriteria(Request $request)
    {
        $activites = Activite::with('categorie', 'departements')->get();
        if ($request->nom) {
            $activites = $activites->where('nom', 'LIKE', $request->nom);
        }
        if ($request->categorie) {
            $activites = $activites->where('categorie_id', 'LIKE', $request->categorie);
        }
//        if ($request->departement) {
//            $activites=$activites->where('departements.id','LIKE',$request->departement);
//        }
        if ($request->deleted == 1) {
            $activites = $activites->where('deleted_at', 'IS', 'NULL');
        }
        if ($request->nb_place_max) {
            $activites = $activites->where('nb_place', '<=', $request->nb_place_max);

        }
        if ($request->nb_place_min) {
            $activites = $activites->where('nb_place', '>=', $request->nb_place_min);

        }
        if ($request->description) {
            $activites = $activites->where('description', 'LIKE', "%" . $request->description . "%");
        }
        //print_r(DB::getQueryLog());
        return Response::json($activites);
    }

    public function update(Request $request)
    {
        $activite = Activite::find($request->id);
        if($activite==null){
            return Response::json(['etat' => false, 'id' => $request->id]);
        }
        if ($request->nom != null and $request->nom != $activite->nom) {
            $activite->nom = $request->nom;
        }
        if ($request->description != null and $request->description != $activite->description) {
        $activite->description = $request->description;
    }

        if ($request->nb_place != null and is_numeric($request->nb_place) and $request->nb_place != $activite->nb_place) {
            $activite->nb_place =(int)$request->nb_place;
        }
        if ($request->categorie != null and $request->categorie != $activite->categorie_id) {
            $activite->categorie_id = $request->categorie;
        }

        $activite->save();
        return Response::json(['etat' => true, 'id' => $activite->id]);
    }

    public function store(ActiviteRequest $request)
    {
        $activite = new Activite();
        $activite->nom = $request->input('nom');
        $activite->description = $request->input('description');
        $activite->nb_place = $request->input('nb_place');
        $activite->categorie_id = $request->input('categorie');
        $activite->save();
        foreach ($request->input('departements') as $departement) {
            $realisation = new Realisation();
            $realisation->departement_id = $departement;
            $realisation->activite_id = $activite->id;
            $realisation->save();
            $realisation = null;
        }
        return redirect('admin/activites');
    }

    public function destroy($id)
    {
        $activite = Activite::find($id);
        if ($activite) {
            $participations = Participation::all()->where('activite_id', '=', $id);
            $realisations = Realisation::all()->where('activite_id', '=', $id);
            if ($participations != null and !$participations->isEmpty())
                foreach ($participations as $participation) {
                    $participation->delete();
                }
            if ($realisations != null and !$realisations->isEmpty())
                foreach ($realisations as $realisation) {
                    $realisation->delete();
                }
        }
        $activite->delete();
        return Response::json(['etat' => true]);
    }


    public function show($id)
    {
        $activite = Activite::with('categorie', 'departements', 'users')->find($id);
        return Response::json($activite);
    }

    public function showActivite($id)
    {
        $activite = Activite::with('categorie', 'departements.bureauMemeber.adherent')->find($id);
        $activite_images = ActiviteImage::all()->where('activite_id', $id);
        $activites = Activite::all()->sortByDesc('created_at')->take(10);

        return view('activite', ['activite' => $activite, 'activite_images' => $activite_images, 'activites' => $activites]);
    }

    public function findDeleted()
    {
        $activites = Activite::onlyTrashed()->get();
        return view('admin.activite.trash', ['activites' => $activites]);
    }

    public function rest(Request $request)
    {
        if ($request->input('id'))
            $activite = Activite::onlyTrashed()->where('id', $request->input('id'))->restore();
        return redirect('admin/activites/rest');
    }

    public function loadActivites()
    {
        $activites = Activite::all();
        return view('admin.activite.images', ['activites' => $activites]);

    }
}
