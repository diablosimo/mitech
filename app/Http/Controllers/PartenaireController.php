<?php

namespace App\Http\Controllers;

use App\FormeJuridique;
use App\Http\Requests\PartenaireRequest;
use App\Mail\WelcomeMailPartenaire;
use App\Notifications\ApprouvePartenaireNotification;
use App\Partenaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class PartenaireController extends Controller
{

    public static function findAll()
    {
        return Partenaire::all();
    }

    public static function nbApprouve()
    {
        return Partenaire::whereHas('user', function ($q) {
            $q->where('approuve', '=', '1');
        })->count();
    }

    public static function nbNonApprouve()
    {
        return Partenaire::whereHas('user', function ($q) {
            $q->where('approuve', '=', '0');
        })->count();
    }

    public static function loadApprouve()
    {
        $partenaires = Partenaire::with('user')->get()->where('user.approuve', 1);
        if ($partenaires->isEmpty()) return false;
        return $partenaires;
    }

    public function create()
    {
        return view('partenaire');
    }

    public function edit(Request $request)
    {
        $partenaire = Partenaire::with('user')->where('user_id', Auth::user()->id)->firstOrFail();
        $user = User::find($partenaire->user_id);
        $nbEdit = 0;
        if ($partenaire) {
            if ($request->nom_respo and $partenaire->nom_respo != $request->nom_respo) {
                $validatedData = $request->validate(['nom_respo' => 'regex:/^[\pL\s\-]+$/u|min:3']);
                $partenaire->nom_respo = $request->nom_respo;
                $nbEdit++;
            }
            if ($request->prenom_respo and $partenaire->prenom_respo != $request->prenom_respo) {
                $validatedData = $request->validate(['prenom_respo' => 'regex:/^[\pL\s\-]+$/u|min:3',]);
                $partenaire->prenom_respo = $request->prenom_respo;
                $nbEdit++;
            }
            if ($request->numtel_respo and $partenaire->numtel_respo != $request->numtel_respo) {
                $validatedData = $request->validate(['numtel_respo' => 'min:10|regex:%^[+]{0,1}[(]{0,1}[0-9]{0,3}[)]{0,1}[-\s\./0-9]{1,15}$%']);
                $partenaire->numtel_respo = $request->numtel_respo;
                $nbEdit++;
            }
            if ($request->forme_juridique and $partenaire->forme_juridique_id != $request->forme_juridique) {
                $partenaire->forme_juridique_id = $request->forme_juridique;
                $nbEdit++;
            }
            if ($request->hasFile('photo')) {
                $validatedData = $request->validate(['photo' => 'file|image']);
                $filename = Input::file('photo')->hashName();
                Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(175,
                    50)->save(storage_path('app\public\partenaire\\' . $filename));
                $path = storage_path('app\public\partenaire\\' . $partenaire->user->photo);
                if (file_exists($path)) {
                    unlink($path);
                }
                $user->photo = $filename;
                $user->save();
                $nbEdit++;
            }
            if ($nbEdit > 0) {
                $partenaire->save();
                session()->flash('success', 'Modification effectuée.');
            } else {
                session()->flash('failed', 'Modification non effectuée.');
            }
            return redirect('/compte');
        }
    }

    public function store(PartenaireRequest $request)
    {
        $partenaire = new Partenaire();
        $user = new User();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('photo')) {
            $filename = Input::file('photo')->hashName();
            Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(175, 50)->save(storage_path('app\public\partenaire\\' . $filename));
            $user->photo = $filename;
        }
        $user->approuve = 0;

        $partenaire->nom = $request->input('nom');
        $partenaire->nom_respo = $request->input('nom_respo');
        $partenaire->prenom_respo = $request->input('prenom_respo');

        $partenaire->forme_juridique_id = $request->input('forme_juridique');
        if (!FormeJuridique::all()->find($partenaire->forme_juridique_id)) return abort(404);
        $partenaire->numtel_respo = $request->input('numtel_respo');
        $user->save();
        $partenaire->user_id = $user->id;
        $partenaire->save();

        Mail::to($user->email)->queue(new WelcomeMailPartenaire($partenaire->nom_respo . ' ' . $partenaire->prenom_respo, $partenaire->nom, FormeJuridique::find($partenaire->forme_juridique_id)->nom));

        session()->flash('success', 'votre demmande de partenariat a été enregistée.');
        return redirect('partenaire');
    }

    public function findByCriteria(Request $request)
    {
        $partenaires = Partenaire::with('formeJuridique', 'user')->get();
        if ($request->nom) {
            $partenaires = $partenaires->where('nom', 'LIKE', htmlspecialchars($request->nom));
        }
        if ($request->nom_respo) {
            $partenaires = $partenaires->where('nom_respo', 'LIKE', htmlspecialchars($request->nom_respo));
        }
        if ($request->forme_juridique_id) {
            $partenaires = $partenaires->where('forme_juridique_id', '=', $request->forme_juridique_id);
        }
        return Response::json($partenaires);
    }

    public function list()
    {
        return view('admin.adherent.list');
    }

    public function destroy($id)
    {
        $partenaire = Partenaire::find($id);
        if ($partenaire) {
            $user = User::find($partenaire->user_id);
            if ($user) $user->delete();
            $partenaire->delete();
        }
        return Response::json(['etat' => true]);
    }

    public function forceDestroy($id)
    {
        $user = User::find($id);
        $partenaire = Partenaire::all()->where('user_id', $id)->first();
        if ($user and $user->photo) {
            unlink(storage_path('app\public\partenaire\\' . $user->photo));
            $user->forceDelete();
        }
        $partenaire->forceDelete();
        return redirect('admin/partenaires/approuver');
    }

    public function approuver(Request $request)
    {
        $user = new User();
        if ($request->id)
            $user = User::find($request->id);
        if ($user) {
            $user->approuve = 1;
            $user->save();
            $partenaire = Partenaire::where('user_id', $user->id)->first();
            $user->notify(new ApprouvePartenaireNotification(
                $partenaire->nom_respo . ' ' . $partenaire->prenom_respo,
                $partenaire->nom,
                FormeJuridique::find($partenaire->forme_juridique_id)->nom,
                $user->email
            ));
            // Mail::to($user->email)->queue(new ApprouvementPartenariat($partenaire->nom_respo . ' ' . $partenaire->prenom_respo, $partenaire->nom, FormeJuridique::find($partenaire->forme_juridique_id)->nom, $user->email));
        }
        return redirect('admin/partenaires/approuver');
    }

    public function loadNonApprouve()
    {
        $partenaires = Partenaire::with('user', 'formeJuridique')->get()->where('user.approuve', 0);
        return view('admin.partenaire.approuve', ['partenaires' => $partenaires]);
    }

}
