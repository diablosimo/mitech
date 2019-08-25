@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Partenaires
        <div class="page-title-subheading">Approuver/supprimer les demandes</div>
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
                                        <th>Forme juridique</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partenaires as $partenaire)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img class="rounded" src="{{asset('storage/partenaire/'.$partenaire->user->photo)}}" alt="" width="70">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $partenaire->nom }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>{{ $partenaire->formeJuridique->nom }}</p>
                                            </td>
                                            <td>
                                                <form action="{{route('approuvePartenaire')}}" method="post" style="display: inline">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$partenaire->user_id}}">
                                                    <input type="submit" class="btn btn-danger" value="Approuver">
                                                </form>
                                                <form action="{{route('deleteDemandePartenaire',$partenaire->user_id)}}" method="post" style="display: inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$partenaire->user_id}}">
                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('êtes-vous sûr?')" value="Supprimer">
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