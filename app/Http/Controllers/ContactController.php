<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Mapper;

class ContactController extends Controller
{
    public function create()
    {
        Mapper::map(
            31.640231, -7.999600, ['zoom' => 15, 'markers' => ['title' => 'MITech', 'animation' => 'DROP'], 'eventBeforeLoad' => "map.addListener('tilesloaded', function(e) {
			$('.dismissButton').click();
		});"]
        );
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->nom = $request->input('nom');
        $contact->prenom = $request->input('prenom');
        $contact->email = $request->input('email');
        $contact->numtel = $request->input('numtel');
        $contact->objet = $request->input('objet');
        $contact->message = $request->input('message');
        $contact->admin_id = null;
        //should addd nullable in migration for admin_id
        $contact->save();
        session()->flash('success', 'votre requette à été enregister.');
        return redirect('contact');
    }

    public function findByDateMinMax(Request $request)
    {
        $from = $request->date_min;
        $to = $request->date_max;
        $contacts = Contact::all();
        if ($from) {
            $contacts = $contacts->where('created_at', '>=', $from);
        }
        if ($to) {
            $contacts = $contacts->where('created_at', '<=', $to);
        }
        return Response::json($contacts);
    }

    public function destroy($id)
    {
        $state = false;
        $contact = Contact::find($id);
        if ($contact) {
            $contact->admin_id = AdminController::getConnectedAdmin()->id;
            $contact->save();
            $contact->delete();
            $state = true;
        }
        return Response::json(['etat' => $state]);
    }

    public function list()
    {
        return view('admin.contact.list');
    }
}
