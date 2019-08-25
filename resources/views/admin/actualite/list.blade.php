@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-world icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Actualités
        <div class="page-title-subheading">liste des actualités</div>
    </div>
@endsection

@section('content')
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Liste...</span>
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
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>sous titre</th>
                                        <th>date de publication</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($actualites as $actualite)
                                        <tr>
                                            <td>{{ $actualite->titre }}</td>
                                            <td>{{ $actualite->sous_titre}}</td>
                                            <td>{{ $actualite->date_publication }}</td>
                                            <td>
                                                <form action="{{url('admin/actualites/'.$actualite->id)}}"
                                                      method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#exampleModal" @click="getActualite({{$actualite->id}})"
                                                            class="btn btn-primary">details
                                                    </button>
                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('êtes-vous sûr?')" value="supprimer">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                <p class="title">Titre</p>
                            </div>
                            <div class="col-md-8">
                                <p class="val">:@{{showed.titre}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="title">Sous-titre</p>
                            </div>
                            <div class="col-md-8">
                                <p class="val">:@{{showed.sous_titre}}</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="title">Date de publication</p>
                            </div>
                            <div class="col-md-8">
                                <p class="val">:@{{ showed.date_publication }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="title">Ajoutée par:</p>
                            </div>
                            <div class="col-md-8">
                                <p class="val">:@{{ showed.admin.nom}} @{{showed.admin.prenom}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="title">image</p>
                            </div>
                            <div class="col-md-8">
                                <img class="img-fluid" :src="showed.photo" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="title">article:</p>
                            </div>
                            <div class="col-md-8">
                                <textarea  class="form-control" disabled="" rows="10">:@{{showed.article}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-9 offset-1">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{url('admin/actualites')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label class="">Titre</label>
                                            <input name="titre" placeholder="titre de l'activité..."
                                                   type="text"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label>Sous titre</label>
                                            <input name="sous_titre" placeholder="sous titre de l'activité..."
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label class="">figure</label>
                                            <input name="photo" type="file" class="form-control-file" required>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group col-md-12">
                                        <label class="">Article</label>
                                        <textarea name="article" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <input type="submit" value="Ajouter" class="mt-1 btn btn-primary">
                                <input type="button" value="Annuler" class="mt-1 btn btn-secondary">
                            </form>
                        </div>
                    </div>
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
    <script src="{{asset('js/admin/actualite/list.js')}}"></script>
@endsection