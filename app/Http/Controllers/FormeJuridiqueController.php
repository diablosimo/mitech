<?php

namespace App\Http\Controllers;

use App\FormeJuridique;
use Illuminate\Http\Request;

class FormeJuridiqueController extends Controller
{
    public static function findAll()
    {
        $formeJuridiques = FormeJuridique::all();
        return $formeJuridiques;
    }

    public function findNonUsed()
    {
        $formeJuridiques=FormeJuridique::withoutTrashed()->doesntHave('withTrashedPartenaires');
        return $formeJuridiques;
    }

    public function index()
    {
        return view('admin.partenaire.formeJuriqdique',['formeJuridiqus'=>$this->findNonUsed()->get()]);
    }

    public function destroy($id){
        $fj=FormeJuridique::find($id);
        $res=false;
        if($fj){
            foreach ($this->findNonUsed()->get('id')->toArray() as $a){
               $res=array_search($id,$a);
               if($res){break;}
            }
            if($res!=false){
                $fj->forceDelete();
                session()->flash('success', 'suppresion avec succès');
            }else{
                session()->flash('failed', 'On a des partenaires appartenant à cette forme juridique.');
            }
        }else{
            session()->flash('failed', 'Forme juridique introuvable');
        }
        return redirect('admin/formejuridique');
    }

    public function store(Request $request){
        if ($request->nom) {
            $validatedData = $request->validate(['nom' => "regex:%^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$%"]);

            $fjs = FormeJuridique::all()->where('nom', $request->nom)->count();
            if ($fjs==0){
                $fj=new FormeJuridique();
                $fj->nom=$request->nom;
                $fj->save();
                session()->flash('success', 'Forme juridique crée avec succès');
            }else{
                session()->flash('failed', 'Forme juridique existante');
            }
            }
        return redirect('admin/formejuridique');
    }
}
