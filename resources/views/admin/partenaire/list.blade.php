@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Partenaires
        <div class="page-title-subheading">...</div>
    </div>
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label  class="">Nom</label>
                                        <input name="nom" placeholder="nom du partenaire..."
                                               type="text"
                                               class="form-control" v-model="partenaire.nom">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Nom du responsable</label>
                                        <input name="nom_respo" type="text" placeholder="nom du responsable..."
                                               class="form-control"
                                               v-model="partenaire.nom_respo">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Forme juridique</label>
                                        <select name="forme_juridique" class="custom-select" v-model="partenaire.forme_juridique_id">
                                            <option value="">------</option>
                                        @foreach(\App\Http\Controllers\FormeJuridiqueController::findAll() as $formeJuridique)
                                                <option value="{{$formeJuridique->id}}">{{$formeJuridique->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="button" value="Rechercher" @click="findPartenaires" class="mt-1 btn btn-primary">
                            <input type="button" value="Annuler" class="mt-1 btn btn-secondary">


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Resultats</h5>
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Nom et prenom du responsable</th>
                                        <th>N° telephone</th>
                                        <th>Forme juridique</th>
                                        <th>Approuver?</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="partenaire in partenaires" v-cloak>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img class="rounded-circle" :src="partenaire.user.photo"
                                                                 alt="" width="40">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">@{{ partenaire.nom }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>@{{ partenaire.nom_respo }} @{{ partenaire.prenom_respo }}</td>
                                        <td>@{{ partenaire.numtel_respo }}</td>
                                        <td>@{{ partenaire.forme_juridique.nom }}</td>
                                        <td v-if='partenaire.user.approuve==1'>Oui</td>
                                        <td v-else-if='partenaire.user.approuve==0'>Non</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" @click="getPartenaire(partenaire)">
                                                detail
                                            </button>
                                            <button class="btn btn-danger" @click="deletePartenaire(partenaire)">supprimer</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="" :src="showed.user.photo" alt=""></div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Nom:</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.nom}} (@{{ showed.forme_juridique.nom }})</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Nom du responsable</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.nom_respo}} @{{showed.prenom_respo}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">N°Tel</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.numtel_respo}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">email</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{ showed.user.email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/admin/util/modalToResult.js')}}"></script>
    <script src='{{asset('js/vue.js')}}'></script>
    <script src='{{asset('js/axios.min.js')}}'></script>
    <script>
        window.Laravel ={!!json_encode([
            'csrfToken'=>csrf_token(),
            'url'=>url('/')
        ]) !!};
    </script>
    <script src="{{asset('js/admin/partenaire/list.js')}}"></script>

@endsection