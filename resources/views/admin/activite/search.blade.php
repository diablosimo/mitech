@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-culture icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Activités
        <div class="page-title-subheading">...</div>
    </div>
@endsection

@section('content')
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Rechercher...</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>Ajouter...</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Nom</label>
                                        <input name="nom" placeholder="intitulé de l'activité"
                                               type="text"
                                               class="form-control" v-model="activite.nom">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Categorie</label>
                                        <select name="categorie" id="exampleSelect" class="form-control cat"
                                                v-model="activite.categorie">
                                            <option value=""></option>
                                            @foreach($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label class="">NB places min</label>
                                        <input name="nb_place_min" type="number" class="form-control"
                                               v-model="activite.nb_place_min">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label>NB places max</label>
                                        <input name="nb_place_max" type="number" class="form-control"
                                               v-model="activite.nb_place_max">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="position-relative form-group col-md-8">
                                    <label class="">Description</label>
                                    <textarea name="description"
                                              class="form-control" v-model="activite.description"></textarea>
                                </div>
                            </div>
                            <input type="button" value="Rechercher" @click="findActivites" class="mt-1 btn btn-primary">
                            <input type="button" value="Annuler" class="mt-1 btn btn-secondary">


                        </div>
                    </div>
                </div>
            </div>
            <modal v-if="showModal" @close="showModal=false" v-cloak>
                <div class="main-card mb-3 card">
                    <h3 slot="header">modifier l'activité</h3>
                    <div slot="body">
                        <input type="hidden" disabled class="form-control" id="e_id" name="id">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label class="">Nom</label>
                                    <input name="nom" placeholder="intitulé de l'activité"
                                           type="text"
                                           class="form-control" required v-model="ed.nom">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label>Categorie</label>
                                    <select name="categorie" class="form-control cat" required v-model="ed.categorie">
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label class="">Nb places</label>
                                    <input name="nb_place" type="number" class="form-control" required
                                           v-model="ed.nb_place">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label class="">Description</label>
                                    <textarea name="description" class="form-control" required
                                              v-model="ed.description"></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Modifier" class="mt-1 btn btn-primary" @click="updateActivite">
                        <input type="button" value="Annuler" class="mt-1 btn btn-secondary" @click="showModal = false">
                    </div>

                </div>
            </modal>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Resultats</h5>
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Departement(s)</th>
                                        <th>Categorie</th>
                                        <th>Nombre de place total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="activite in activites" v-cloak>
                                        <td>@{{ activite.nom }}</td>
                                        <td>
                                            <p v-for="dep in activite.departements">@{{ dep.nom }}</p>
                                        </td>


                                        <td>@{{ activite.categorie.nom }}</td>
                                        <td>@{{ activite.nb_place }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" @click="getActivite(activite)">
                                                detail
                                            </button>
                                            <button class="btn btn-secondary" id="show-modal"
                                                    @click="editActivite(activite)">
                                                modifier
                                            </button>
                                            <button class="btn btn-danger" @click="deleteActivite(activite)">supprimer
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
        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" action="{{url('activite')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label class="">Nom</label>
                                            <input name="nom" placeholder="intitulé de l'activité"
                                                   type="text"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label>Categorie</label>
                                            <select name="categorie" class="form-control cat" required>
                                                @foreach($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label class="">Nb places</label>
                                            <input name="nb_place" type="number" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label class="">Departement(s)</label>
                                            <select multiple="" type="departement" name="departements[]"
                                                    class="custom-select" required>
                                                @foreach($departements as $departement)
                                                    <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group col-md-12">
                                        <label class="">Description</label>
                                        <textarea name="description" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <input type="submit" value="Ajouter" class="mt-1 btn btn-primary">
                                <input type="button" value="Annuler" class="mt-1 btn btn-secondary">

                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Ajouter une categorie</h5>
                            <div>
                                <form id="categorie-form">
                                    {{csrf_field()}}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <input type="submit" value="Ajouter" class="btn btn-secondary">
                                        </div>
                                        <input type="text" name="nom_categorie" class="form-control" required></div>
                                </form>
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
                        <div class="col-md-4">
                            <p class="title">Nom</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.nom}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Description</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.description}}</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Categorie</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{ showed.categorie.nom }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Nb place total</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.nb_place}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Departement(s)</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val" v-for="dep in showed.departements">:@{{ dep.nom }}</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Participant(s)</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val" v-for="usr in showed.users">:@{{ usr.email}}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/admin/util/modalToResult.js')}}"></script>
    <script >
        $(document).ready(function () {
            $('#categorie-form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{url('categorie')}}",
                    data: $('#categorie-form').serialize(),
                    success: function (response) {
                        var t = JSON.parse(response);
                        $('.cat').append("<option selected value='" + t['id'] + "'>" + t['nom'] + "</option>")
                    },
                    error: function (error) {
                        alert('failed');
                    }
                });
            });
        });
    </script>
    <script src='{{asset('js/vue.js')}}'></script>
    <script src='{{asset('js/axios.min.js')}}'></script>
    <script>
        window.Laravel ={!!json_encode([
            'csrfToken'=>csrf_token(),
            'url'=>url('/')
        ]) !!};
    </script>
    <script src="{{asset('js/admin/activite/search.js')}}"></script>
@endsection