<?php

namespace App\Http\Controllers;

use App\Actualite;
use App\Http\Requests\ActualiteRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ActualiteController extends Controller
{
    public function index()
    {
        //Auth::logout();
        $actualites = Actualite::all()->sortByDesc('date_publication')->take(8);
        //dd($actualites);
        return view('home', ['actualites' => $actualites]);
    }

    public function show($id)
    {        $actualite = Actualite::findOrFail($id);
        return view('actualite', ['actualite' => $actualite,'recentActs'=>ActualiteController::getRecent(4)]);
    }

    public function get($id)
    {
        $actualite = Actualite::with('admin')->findOrFail($id);
        return Response::json($actualite);
    }

    public static function getRecent($nb=3){
        $recentActs  = Actualite::all()->sortByDesc('date_publication')->take($nb);
        return $recentActs;
    }

    public function list(){
        $actualites = Actualite::all()->sortByDesc('date_publication');
        return view('admin.actualite.list', ['actualites' => $actualites]);
    }

    public function destroy($id){
        $actualite=Actualite::find($id);
        if($actualite and $actualite->photo){
            unlink(storage_path('app\public\actualite\\' . $actualite->photo));
        }
        $actualite->forceDelete();
        return redirect('admin/actualites');
    }

    public function store(ActualiteRequest $request){
        $actualite=new Actualite();
        $actualite->titre=$request->input('titre');
        $actualite->sous_titre=$request->input('sous_titre');
        if ($request->hasFile('photo')) {
            $filename = Input::file('photo')->hashName();
            Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(1600, 800)->save(storage_path('app\public\actualite\\' . $filename));
            $actualite->photo = $filename;
        }
        $actualite->article=$request->input('article');
        $actualite->admin_id=AdminController::getConnectedAdmin()->id;
        $actualite->date_publication=Carbon::now();
        $actualite->save();
        return redirect('admin/actualites');
    }


}
