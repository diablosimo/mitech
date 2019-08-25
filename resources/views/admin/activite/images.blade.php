@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-culture icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Actualités
        <div class="page-title-subheading">images d'activités</div>
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
    <div class="tab-content" id="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="form-inline">
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">Activités</label>
                                    <select name="activite_id" class="custom-select" @change="findPhotos" v-model="activite.id">
                                        @foreach($activites as $activite)
                                            <option value="{{$activite->id}}">{{$activite->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="photo in photos" v-cloak>
                                        <td>
                                            <div class="widget-content-left">
                                                <img class="rounded-circle" :src="photo.image"
                                                     alt="" width="40">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary delete" data-toggle="modal"
                                                    data-target="#exampleModal" @click="getPhoto(photo)">
                                                voir
                                            </button>
                                            <button class="btn btn-danger" @click="deletePhoto(photo)">supprimer</button>
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
                            <form class="form-inline" action="{{url('admin/activites/photos/create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">Activité</label>
                                    <select name="activite_id" class="custom-select">
                                        @foreach($activites as $activite)
                                            <option value="{{$activite->id}}">{{$activite->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">Image</label>
                                    <input name="photo" type="file" class="custom-file" required>
                                </div>
                                <input type="submit" value="Ajouter" class="mt-1 btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left: 0px;  padding-right: 0px;">
                    <img  class="img-fluid" :src="showed.image">

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
    <script src="{{asset('js/admin/activite/images.js')}}" ></script>


@endsection