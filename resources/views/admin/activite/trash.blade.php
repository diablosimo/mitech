@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-culture icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Activités
        <div class="page-title-subheading">restaurer les activités</div>
    </div>
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Categorie</th>
                                        <th>description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activites as $activite)
                                        <tr>
                                            <td>{{ $activite->nom }}</td>
                                            <td>{{ $activite->nom}}</td>
                                            <td>{{ $activite->description }}</td>
                                            <td>
                                                <form action="{{route('rest')}}" method="post">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$activite->id}}">
                                                    <input type="submit" class="btn btn-danger" value="restaurer" >
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
    </div>
@endsection