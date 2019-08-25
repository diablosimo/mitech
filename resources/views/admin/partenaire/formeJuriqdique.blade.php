@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Formes juridique des partenaires
        <div class="page-title-subheading">...</div>
    </div>
@endsection

@section('content')


    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-lg-3 offset-1">
                    <div class="main-card mb-3 card">
                        <ul class="list-group list-group-flush">
                            @foreach($formeJuridiqus as $formeJuridique)
                                <li class="list-group-item">
                                    <form action="{{url('admin/formejuridique/'.$formeJuridique->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">{{$formeJuridique->nom}}</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div role="group" class="btn-group-sm btn-group">
                                                        <button type="submit" class="btn-shadow btn btn-danger">
                                                            Supprimer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5>Ajouter une Forme juridiue</h5>
                            <form action="{{url('admin/formejuridique')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label>Nom</label>
                                            <input name="nom" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Ajouter" class="mt-1 btn btn-primary">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
