<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>array('statut','termeAdhesion','termeAdhesion')]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function organisation()
    {
        return view('organisation');
    }

    public function bureau()
    {
        return view('bureau');
    }

    public function statut()
    {
        return view('statut');
    }

    public function termeAdhesion (){return view('termes.adhesion');}
    public function termePartenariat(){return view('termes.partenariat');}


}
