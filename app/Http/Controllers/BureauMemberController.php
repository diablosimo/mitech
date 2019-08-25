<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\BureauMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BureauMemberController extends Controller
{
    public static function findAll()
    {
        $bureauMembers = BureauMember::with('adherent')->get();
        return $bureauMembers;
    }

    public function index()
    {
        $bureauMembers = BureauMember::all();
        return view('bureau', ['membres' => $bureauMembers]);
    }

    public function organisation()
    {
        $bureauMembers = BureauMember::all();
        return view('organisation', ['membres' => $bureauMembers]);
    }

    public function find()
    {
        $membres = BureauMember::with('adherent.user')->get();
        return Response::json($membres);
    }

    public function destroy($id){
        $membre=BureauMember::find($id);
        if($membre){
            $membre->delete();
            return Response::json(['etat'=>true]);
        }else{
            return Response::json(['etat'=>false]);
        }
    }

    public function store(Request $request){
        $membre=new BureauMember();
        $res=false;
        if($request->adherent_id and $request->fonction){
            $membre->adherent_id=$request->adherent_id;
            $membre->fonction=$request->fonction;
            $res=$membre->saveOrFail();
            $membre = BureauMember::with('adherent.user')->findOrFail($membre->id);
        }

        return Response::json(['etat'=>$res,'added'=>$membre]);
    }

    public function list(){
        $adherents=Adherent::with('user')->get()->where('user.approuve', 1);
        return view('admin.adherent.bureau',['adherents'=>$adherents]);
    }
}
