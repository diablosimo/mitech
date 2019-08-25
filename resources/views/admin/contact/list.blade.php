@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-mail icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Messages
        <div class="page-title-subheading">Liste des messages</div>
    </div>
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="form-inline">
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">date min</label>
                                    <input name="date_min" v-model="request.date_min" placeholder="date min..." type="date" class="form-control">
                                </div>
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">date max</label>
                                    <input name="date_max" v-model="request.date_max" placeholder="date max..." type="date" class="form-control">
                                </div>
                                <input type="button" value="Rechercher" @click="findMessages" class="mt-1 btn btn-primary">
                            </form>
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
                                        <th>Email</th>
                                        <th>Sujet</th>
                                        <th>Date de reception</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="message in messages" v-cloak>
                                        <td>@{{ message.email }}</td>
                                        <td>@{{ message.objet }}</td>
                                        <td>@{{ message.created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" @click="getMessage(message)">
                                                detail
                                            </button>
                                            <button class="btn btn-danger" @click="deleteMessage(message)">supprimer
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
                            <p class="title">expediteur</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.nom}} @{{showed.prenom}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">E-mail:</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">N°tel</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{ showed.numtel }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Sujet</p>
                        </div>
                        <div class="col-md-8">
                            <p class="val">:@{{showed.objet}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Description:</p>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" disabled rows="10">:@{{showed.message}}</textarea>
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
    <script src="{{asset('js/admin/contact/list.js')}}"></script>

@endsection