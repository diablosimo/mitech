@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Bureau MITECH
        <div class="page-title-subheading">...</div>
    </div>
@endsection

@section('content')


    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" v-for="membre in membres" v-cloak>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <img class="rounded-circle" :src="membre.adherent.user.photo" alt=""
                                                 width="42">
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">@{{membre.adherent.nom}}
                                                @{{membre.adherent.prenom}}
                                            </div>
                                            <div class="widget-subheading">@{{membre.fonction}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button type="button" class="btn-shadow btn btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal" @click="getMembre(membre)">
                                                    detail
                                                </button>
                                                <button type="button" class="btn-shadow btn btn-danger"
                                                        @click="deleteMembre(membre)">Supprimer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5>Ajouter un memebre au bureau</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label class="">Adherent</label>
                                        <select name="adherent_id" class="custom-select" required
                                                v-model="nvmembre.adherent_id">
                                            @foreach($adherents as $adherent)
                                                <option value="{{$adherent->id}}">{{$adherent->nom}} {{$adherent->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label  class="">Fonction</label>
                                        <input name="fonction" type="text" class="form-control"
                                               v-model="nvmembre.fonction" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" value="Ajouter" @click="addMembre" class="mt-1 btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class=" modal-lg modal-dialog" role="document">
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
                            <img class="img-fluid" :src="showed.adherent.user.photo" alt="">
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Nom</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.adherent.nom}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Preom</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.adherent.prenom}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">N°Tel</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{showed.adherent.num_tel}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">email</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{ showed.adherent.user.email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="title">Poste</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="val">:@{{ showed.fonction }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title">Description:</p>
                        </div>
                        <div class="col-md-10">
                            <textarea class="form-control" disabled=""
                                      rows="5">:@{{showed.adherent.description}}</textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="{{asset('js/admin/adherent/bureau.js')}}"></script>
@endsection