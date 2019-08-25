<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Venturecraft\Revisionable\Revision;
use Venturecraft\Revisionable\Revisionable;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.edit', ['admin' => $this::getConnectedAdmin()]);
    }

    public static function getConnectedAdmin()
    {
        return Admin::where('user_id', Auth::user()->id)->first();
    }

    public function dashbord()
    {
        return view('admin.home');
    }

    public function edit(Request $request)
    {
        $admin = Admin::where('user_id', Auth::user()->id)->firstOrFail();
        $user = User::find($admin->user_id);
        if ($admin) {
            $nbEdit=0;
            if ($request->nom and $admin->nom != $request->nom) {
                $validatedData = $request->validate(['nom' => "regex:%^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$%"]);
                $admin->nom = $request->nom;
                $nbEdit++;
            }
            if ($request->prenom and $admin->prenom != $request->prenom) {
                $validatedData = $request->validate(['prenom' => "regex:%^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$%"]);
                $admin->prenom = $request->prenom;
                $nbEdit++;
            }
            if ($request->email and $user->email != $request->email) {
                $validatedData = $request->validate(['email' => 'E-Mail|unique:users,email']);
                $user->email = $request->email;
                $nbEdit++;
            }
            if ($request->hasFile('photo')) {
                $validatedData = $request->validate(['photo' => 'file|image']);
                $filename = Input::file('photo')->hashName();
                Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(260, 260)->save(storage_path('app\public\admin\\' . $filename));
                if ($user->photo != "default.jpg") {
                    $path = storage_path('app\public\admin\\' . $user->photo);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $user->photo = $filename;
                $nbEdit++;
            }
            if($nbEdit>0){
                $admin->save();
                $user->save();
                session()->flash('success', 'Modification effectuée.');
                return redirect('admin/compte');
            }
        }
        session()->flash('failed', 'Aucune modification n\'a été effectuée.');
        return redirect('admin/compte');

    }



}
