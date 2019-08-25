@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-network icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Departements
        <div class="page-title-subheading">liste des departements</div>
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
                                        <th>Nom</th>
                                        <th>nom du responsable</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departements as $departement)
                                        <tr>
                                            <td>{{ $departement->nom }}</td>
                                            @if($departement->bureauMemeber)
                                                <td>{{ $departement->bureauMemeber->adherent->nom}} {{ $departement->bureauMemeber->adherent->prenom}}</td>
                                            @else
                                                <td>---</td>
                                            @endif
                                                <td>
                                                <form action="{{url('admin/departements/'.$departement->id)}}"
                                                      method="post">
                                                    {{ method_field('DELETE')}}
                                                    {{ csrf_field()}}
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            @click="getDepartement({{$departement->id}})"
                                                            class="btn btn-primary">details
                                                    </button>
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#exampleModal1"
                                                            @click="editDepartement({{$departement->id}})"
                                                            class="btn btn-warning">edit
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
                        <div class="scroll-area-lg">
                            <div class="scrollbar-container ps--active-y">
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
                                        <p class="title">Nom responsable</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="val" v-if="showed.bureau_memeber">:@{{showed.bureau_memeber.adherent.nom}}
                                            @{{showed.bureau_memeber.adherent.prenom}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="title">Description:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" disabled=""
                                                  rows="10">:@{{showed.description}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="title">Adherents:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="list-group">
                                            <li class="list-group-item" v-for="adherent in showed.adherents">
                                                @{{adherent.nom}} @{{ adherent.prenom }}
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Editer...</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="needs-validation" action="{{url('admin/departements')}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input name="id" type="hidden" class="form-control" v-model="ed.id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="">nom</label>
                                        <input name="nom" type="text" class="form-control" v-model="ed.nom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label>Responsable du departement</label>
                                        <select name="respo" class="form-control" v-model="ed.bureau_memeber.id">
                                            <option value="">-------</option>
                                            @foreach(\App\Http\Controllers\BureauMemberController::findAll() as $bureauMember)
                                                <option value="{{$bureauMember->id}}" >{{$bureauMember->adherent->nom}} {{$bureauMember->adherent->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="position-relative form-group col-md-12">
                                    <label class="">Description</label>
                                    <textarea name="description" class="form-control" v-model="ed.description" required></textarea>
                                </div>
                            </div>
                            <input type="submit" value="Editer" class="mt-1 btn btn-primary">
                            <input type="button" value="Annuler" class="mt-1 btn btn-secondary">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-9 offset-1">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{url('admin/departements')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label class="">nom</label>
                                            <input name="nom" placeholder="nom du departement..."
                                                   type="text"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label>Responsable du departement</label>
                                            <select name="respo" class="form-control" required>
                                                @foreach(\App\Http\Controllers\BureauMemberController::findAll() as $bureauMember)
                                                    <option value="{{$bureauMember->id}}">{{$bureauMember->adherent->nom}} {{$bureauMember->adherent->prenom}}</option>
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
            </div>
        </div>
    </div>
@endsection

@section('script')
    <<script src="{{asset('js/admin/util/modalToResult.js')}}"></script>
    <script src="{{asset('js/admin/util/modal1ToEdit.js')}}"></script>
    <script src='{{asset('js/vue.js')}}'></script>
    <script src='{{asset('js/axios.min.js')}}'></script>
    <script>
        window.Laravel ={!!json_encode([
            'csrfToken'=>csrf_token(),
            'url'=>url('/')
        ]) !!};
    </script>
    <script src="{{asset('js/admin/departement/list.js')}}"></script>

@endsection