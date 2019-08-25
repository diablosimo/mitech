<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'nom_categorie' => 'required|min:3'
        ]);
        $categorie=new Categorie();
        $categorie->nom=$request->input('nom_categorie');
        $categorie->save();
        //return view('admin/activites',['categories'=>Categorie::all()]);
        echo $categorie;
    }
}
