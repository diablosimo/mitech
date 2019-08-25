@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Adherents
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
                                        <label >Nom</label>
                                        <input name="nom" placeholder="nom d'adherent..."
                                               type="text"
                                               class="form-control" v-model="adherent.nom">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Prenom</label>
                                        <input name="prenom" type="text" placeholder="prenom d'adherent..."
                                               class="form-control"
                                               v-model="adherent.prenom">
                                    </div>
                                </div>
                            </div>
                            <input type="button" value="Rechercher" @click="findAdherents" class="mt-1 btn btn-primary">
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
                                <table class="mb-0 table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Nom et prenom</th>
                                        <th>Departement(s)</th>
                                        <th>N° telephone</th>
                                        <th>Approuver?</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="adherent in adherents" v-cloak>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img class="rounded-circle" :src="adherent.user.photo"
                                                                 alt="" width="40">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">@{{ adherent.nom }} @{{
                                                            adherent.prenom }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p v-for="dep in adherent.departements">@{{ dep.nom }}</p>
                                        </td>


                                        <td>@{{ adherent.num_tel }}</td>
                                        <td v-if='adherent.user.approuve==1'>Oui</td>
                                        <td v-else-if='adherent.user.approuve==0'>Non</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" @click="getAdherent(adherent)">
                                                detail
                                            </button>
                                            <button v-if='adherent.user.approuve==1' type="button"
                                                    class="btn btn-success" data-toggle="modal"
                                                    data-target="#exampleModal1" @click="affecter(adherent)">Affecter
                                            </button>
                                            <button class="btn btn-danger" @click="deleteAdherent(adherent)">supprimer
                                            </button>
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
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-fluid" :src="showed.user.photo" alt="">
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Nom</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.nom}} @{{showed.prenom}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Preom</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.prenom}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">N°Tel</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.num_tel}}</p>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Departement(s):</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="val" v-for="dep in showed.departements">@{{ dep.nom }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title">Description:</p>
                        </div>
                        <div class="col-md-10">
                            <textarea class="form-control" disabled="" rows="5">:@{{showed.description}}</textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('affecter')}}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Affecter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="adherent" v-model="ed.id">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="">Departement(s)</label>
                            </div>
                            <div class="col-md-8">
                                <select multiple="" type="departement" name="departements[]"
                                        class="custom-select" required>
                                    @foreach(\App\Http\Controllers\DepartementController::findAll() as $departement)
                                        <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/admin/util/modalToResult.js')}}"></script>
    <script src="{{asset('js/admin/util/modal1ToEdit.js')}}"></script>
    <script src='{{asset('js/vue.js')}}'></script>
    <script src='{{asset('js/axios.min.js')}}'></script>
    <script>
        window.Laravel ={!!json_encode([
            'csrfToken'=>csrf_token(),
            'url'=>url('/')
        ]) !!};
    </script>
    <script src="{{asset('js/admin/adherent/list.js')}}"></script>
@endsection