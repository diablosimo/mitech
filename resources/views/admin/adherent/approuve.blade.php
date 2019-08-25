@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Adherents
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
                                        <th>Nom et prenom</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img class="rounded-circle" src="{{asset('storage/adherent/'.$adherent->photo)}}" alt="" width="40">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $adherent->nom }} {{ $adherent->prenom }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{route('approuveAdherent')}}" method="post" style="display: inline">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$adherent->user_id}}">
                                                    <input type="submit" class="btn btn-danger" value="Approuver">
                                                </form>
                                                <form action="{{route('deleteDemande',$adherent->id)}}" method="post" style="display: inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$adherent->id}}">
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