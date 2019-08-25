<?php

namespace App\Http\Controllers;
use App\Adherent;
use App\Appartenance;
use App\BureauMember;
use App\Http\Requests\AdherentRequest;
use App\Mail\ApprouvementAdhesion;
use App\Mail\WelcomeMail;
use App\Notifications\ApprouveAdherentNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class AdherentController extends Controller
{
    public static function nbApprouve()
    {
        return Adherent::whereHas('user', function ($q) {
            $q->where('approuve', '=', '1');
        })->count();
    }

    public static function nbNonApprouve()
    {
        return Adherent::whereHas('user', function ($q) {
            $q->where('approuve', '=', '0');
        })->count();
    }

    public function create()
    {
        return view('adherent');
    }


    public function edit(Request $request){
        $adherent=Adherent::with('user')->where('user_id',Auth::user()->id)->firstOrFail();
        $user=User::find($adherent->user_id);
        if($adherent){

            if($request->numtel and $adherent->num_tel!=$request->numtel){
                $validatedData=$request->validate(['numtel' => 'min:10|regex:%^[+]{0,1}[(]{0,1}[0-9]{0,3}[)]{0,1}[-\s\./0-9]{1,15}$%']);

                $adherent->num_tel=$request->numtel;

            }

            if($request->description and $adherent->description!=$request->description){

                $validatedData=$request->validate(['description' => 'min:10',]);
                $adherent->description=$request->description;
            }
            if ($request->hasFile('photo')) {
                $validatedData=$request->validate(['photo' =>'file|image']);
                $filename = Input::file('photo')->hashName();
                Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(260, 260)->save(storage_path('app\public\adherent\\' . $filename));
                $path=storage_path('app\public\adherent\\' . $adherent->user->photo);
                if(file_exists($path)){
                    unlink($path);
                }
                $user->photo=$filename;
                $user->save();
            }

            $adherent->save();
            session()->flash('success', 'Modification effectuée.');

            return redirect('/compte');
        }
    }


    public function store(AdherentRequest $request)
    {
        $adherent = new Adherent();
        $user = new User();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if ($request->hasFile('photo')) {
            $filename = Input::file('photo')->hashName();
            Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(260, 260)->save(storage_path('app\public\adherent\\' . $filename));
            $user->photo = $filename;
        }
        $user->approuve = 0;

        $adherent->nom = $request->input('nom');
        $adherent->prenom = $request->input('prenom');
        $adherent->description = $request->input('description');
        $adherent->num_tel = $request->input('numtel');
        $user->save();
        $adherent->user_id = $user->id;
        $adherent->save();

        Mail::to($user->email)->queue(new WelcomeMail($adherent->nom.' '.$adherent->prenom));

        session()->flash('success', 'votre demmande d\'adhésion a été enregistée.');
        return redirect('adherent');
    }

    public function findByCriteria(Request $request)
    {

        $adherents = Adherent::with('departements', 'user')->get();
        if ($request->nom) {
            $adherents = $adherents->where('nom', 'LIKE', htmlspecialchars($request->nom));
        }
        if ($request->prenom) {
            $adherents = $adherents->where('prenom', 'LIKE', htmlspecialchars($request->prenom));
        }
        return Response::json($adherents);
    }

    public function list(){return view('admin.adherent.list');}

    public function destroy($id)
    {
        $adherent = Adherent::find($id);
        if ($adherent) {
            $user = User::find($adherent->user_id);
            $mbureau = BureauMember::all()->where('adherent_id', '=', $id);
            $appartenence = Appartenance::all()->where('adherent_id', '=', $id);
            if ($appartenence != null and !$appartenence->isEmpty())
                foreach ($appartenence as $app) {
                    $app->delete();
                }
            if ($user) $user->delete();
            if ($mbureau != null and !$mbureau->isEmpty()) {
                $mbureau->first()->delete();
            }
            $adherent->delete();
        }
        return Response::json(['etat' => true]);
    }

    public function forceDestroy($id){
        $user = User::find($id);
        $adherent = Adherent::all()->where('user_id',$id)->first();
        if($user and $user->photo){
            unlink(storage_path('app\public\adherent\\' . $user->photo));
            $user->forceDelete();
        }
        $adherent->forceDelete();
        return redirect('admin/adherents/approuver');
    }

    public function approuver(Request $request)
    {
        $user=new User();
        if ($request->id)
            $user = User::find($request->id);
        if ($user) {
            $adherent=Adherent::where('user_id',$user->id)->first();
            $user->notify(new ApprouveAdherentNotification('benmansour mohammed','med.benmansour1997@gmail.com'));
            //Mail::to($user->email)->queue(new ApprouvementAdhesion($adherent->nom.' '.$adherent->prenom,$user->email));
            //$user->sendApprouveAdherentNotification($adherent->nom.' '.$adherent->prenom,$user->email);
            $user->approuve = 1;
            $user->save();
        }
        return redirect('admin/adherents/approuver');
    }

    public function loadNonApprouve()
    {
        $adherents=Adherent::join('users','adherents.user_id','=','users.id')->where('users.approuve','=',0)->get();
        //dd($adherents);
        return view('admin.adherent.approuve',['adherents'=>$adherents]);
    }

    public function affecter(Request $request){
        $idAdh=$request->input('adherent');
        $idDeps=$request->input('departements');
        $appart=Appartenance::all()->where('adherent_id',$idAdh);
        $i=0;
        foreach ($idDeps as $d){
            foreach ($appart as $a){
                if($d==$a->departement_id){
                    $i++;
                }
            }
            if($i==0){
                $app=new Appartenance();
                $app->adherent_id=$idAdh;
                $app->departement_id=$d;
                $app->save();
            }
            $i=0;
        }
        foreach ($appart as $a){
            foreach ($idDeps as$d){
                if($d==$a->departement_id){
                    $i++;
                }
            }
            if($i==0){
                $a->forceDelete();
            }
            $i=0;
        }
        return redirect('admin/adherents');
    }
}
