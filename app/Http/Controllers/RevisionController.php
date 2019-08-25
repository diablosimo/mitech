<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Venturecraft\Revisionable\Revision;

class RevisionController extends Controller
{
    private $models = array(
        'App\Activite' => 'Activite',
        'App\ActiviteImage' => 'ActiviteImage',
        'App\Actualite' => 'Actualite',
        'App\Adherent' => 'Adherent',
        'App\Admin' => 'Admin',
        'App\BureauMember' => 'BureauMember',
        'App\Categorie' => 'Categorie',
        'App\Departement' => 'Departement',
        'App\FormeJuridique' => 'FormeJuridique',
        'App\Partenaire' => 'Partenaire',
        'App\User' => 'User'
    );

    public function index()
    {
        return view('admin.revision', ['models' => $this->models,'revisions'=>null]);
    }

    public function findHistory(Request $request)
    {
        $revisions = Revision::query();
       $revisions->where('revisionable_type', $request->model);
       $revisions->whereBetween('created_at',array($request->date_min,$request->date_max));
        $res=null;
        foreach ($revisions->get() as $key=>$elm){
            $res[$key]=$this->getMessageByOperation($elm);

        }
        return view('admin.revision', ['models' => $this->models,'revisions'=>$res]);
    }

    private function getResponsible($revision)
    {
        if ($revision->revisionable_type == 'App\Partenaire' or $revision->revisionable_type == 'App\Adherent') {
            if ($revision->old_value == null) {//create
                return null;
            } elseif ($revision->new_value == null) {//delete
                return $this->getResponsibleAdminName($revision);
            } else {//update
                if ($revision->revisionable_type == 'App\Partenaire') {
                    return $this->getResponsiblePartenaireName($revision);
                } elseif ($revision->revisionable_type == 'App\Adherent') {
                    return $this->getResponsibleAdherentName($revision);
                }
            }
        } elseif ($revision->revisionable_type == 'App\User') {
            if ($revision->old_value == null) {//create
                return null;
            } elseif ($revision->new_value == null) {//delete
                return $this->getResponsibleAdminName($revision);
            } else {//update
                return $revision->userResponsible()->email;
            }
        } else {
            return $this->getResponsibleAdminName($revision);
        }
    }

    private function getResponsibleAdminName($revision)
    {
        $admin = $revision->userResponsible()->admin()->get()->first();
        return $admin->nom . ' ' . $admin->prenom;
    }

    private function getResponsibleAdherentName($revision)
    {
        $admin = $revision->userResponsible()->adherent()->get()->first();
        return $admin->nom . ' ' . $admin->prenom;
    }

    private function getResponsiblePartenaireName($revision)
    {
        $admin = $revision->userResponsible()->partenaire()->get()->first();
        return $admin->nom;
    }

    private function getMessageByOperation($revision)
    {
        $message= $this->getResponsible($revision). ' a';
        if ($revision->old_value == null) {
             $message .= " crée '".$this->models[$revision->revisionable_type]."': ".$revision->new_value." à:".$revision->created_at.".";
        } elseif ($revision->new_value == null) {
            $message .= " supprimé '".$this->models[$revision->revisionable_type]."': ".$revision->old_value." à:".$revision->created_at.".";
        } else {
            $message .= " modifié '".$this->models[$revision->revisionable_type]."': ".$revision->key." de:".$revision->old_value." à:".$revision->new_value." à:".$revision->created_at.".";
        }
        return $message;
    }
}
