<?php

namespace App\Http\Controllers;

use App\Appartenance;
use App\Departement;
use App\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartementController extends Controller
{


    public static function findAll()
    {
        $departements = Departement::all();
        return $departements;
    }

    public function show($id)
    {
        $departement = Departement::where('id', '=', $id)->with('activites.categorie', 'bureauMemeber.adherent.user')->first();
        return view('departement', ['departement' => $departement]);
    }

    public function getDepartement($id)
    {
        $departement = Departement::with('adherents', 'bureauMemeber.adherent', 'activites')->find($id);
        return Response::json($departement);
    }

    public function index()
    {
        $departements = Departement::with('bureauMemeber.adherent.user')->get();
        //dd($departements);
        return view('admin.departement.list', ['departements' => $departements]);
    }

    public function edit(Request $request)
    {
        $departement = Departement::find($request->id);
        if ($request->nom and !empty($request->nom))
            $departement->nom = $request->nom;
        if ($request->description and !empty($request->description))
            $departement->description = $request->description;
        if ($request->respo and !empty($request->respo))
            $departement->bureau_member_id = $request->respo;
        $departement->save();
        return redirect('admin/departements');

    }

    public function store(Request $request)
    {
        $departement = new Departement();
        $departement->nom = $request->nom;
        $departement->description = $request->description;
        $departement->bureau_member_id = $request->respo;
        $departement->save();
        return redirect('admin/departements');
    }

    public function destroy($id){
        $departement=Departement::find($id);
        if($departement){
            $appatenences = Appartenance::all()->where('departement_id', '=', $id);
            $realisations = Realisation::all()->where('departement_id', '=', $id);

            if(($appatenences == null or $appatenences->isEmpty()) and ($realisations != null or $realisations->isEmpty())){
                $departement->forceDelete();
            }else{
                if ($appatenences != null and !$appatenences->isEmpty())
                    foreach ($appatenences as $appatenence) {
                        $appatenence->delete();
                    }
                if ($realisations != null and !$realisations->isEmpty())
                    foreach ($realisations as $realisation) {
                        $realisation->delete();
                    }
                $departement->delete();

            }
        }
        return redirect('admin/departements');
    }
}
