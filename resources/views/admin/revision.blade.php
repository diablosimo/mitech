@extends('layouts.admin')

@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-display2 icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Historique
        <div class="page-title-subheading">des opérations</div>
    </div>
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="form-inline" action="{{url('admin/revisions')}}" method="post">
                                @csrf
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">date min</label>
                                    <input name="date_min" placeholder="date min..." type="date" class="form-control" value="{{now()->format('Y-m-d')}}" required>
                                </div>
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">date max</label>
                                    <input name="date_max" placeholder="date max..." type="date" value="{{\Carbon\Carbon::tomorrow()->format('Y-m-d')}}" class="form-control" required>
                                </div>
                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label class="mr-sm-2">Modele</label>
                                    <select name="model" class="form-control" required>
                                        <option value="" >--SELECT--</option>
                                    @foreach($models as $key=>$model)
                                            <option value="{{$key}}">{{$model}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" value="Rechercher" class="mt-1 btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        @if($revisions!=null)
                            <div class="card-body"><h5 class="card-title">Resultats</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table">
                                        <thead>
                                        <tr>
                                            <th>Historique</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($revisions as $key=>$revision)
                                            <tr>
                                                <td>{{ $revision }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
