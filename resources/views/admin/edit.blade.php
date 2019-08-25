@extends('layouts.admin')
@section('header')
    <div class="page-title-icon">
        <i class="pe-7s-user icon-gradient bg-premium-dark">
        </i>
    </div>
    <div>Administrateur
        <div class="page-title-subheading">Compte d'admin</div>
    </div>
@endsection

@section('content')

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{url('admin/compte')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-md-5">
                                        <img class="img-fluid" src="{{asset('storage/admin/'.Auth::user()->photo)}}"
                                             alt="">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label class="">Nom</label>
                                                    <input name="nom" placeholder="votre nom..." type="text"
                                                           class="form-control" value="{{$admin->nom}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label class="">Preom</label>
                                                    <input name="prenom" placeholder="votre prenom..." type="text"
                                                           class="form-control" value="{{$admin->prenom}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label>Email</label>
                                                    <input name="email" placeholder="votre email..." type="email"
                                                           value="{{Auth::user()->email}}" class="form-control"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label class="">photo</label>
                                                    <input name="photo" type="file" class="form-control-file" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Modifier" class="mt-1 btn btn-primary">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{url('editPassword')}}">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group @if($errors->get('old_password')) has-error @endif">
                                            <label>Ancien mot de passe</label>
                                            <input class="form-control" name="old_password" id="old_password"
                                                   type="password" required>
                                            @if($errors->get('old_password'))
                                                <li>{{$errors->first('old_password')}}</li>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group @if($errors->get('password')) has-error @endif">
                                            <label>Nouveau mot de passe</label>
                                            <input class="form-control" name="password" id="password"
                                                   type="password" required>
                                            @if($errors->get('password'))
                                                <li>{{$errors->first('password')}}</li>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group @if($errors->get('cpassword')) has-error @endif">
                                            <label>Confirmer mot de passe</label>
                                            <input class="form-control" name="password_confirmation"
                                                   id="password_confirmation"
                                                   type="password" required>
                                            @if($errors->get('password_confirmation'))
                                                <li>{{$errors->first('password_confirmation')}}</li>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <input type="submit" value="Modifier" class="mt-1 btn btn-primary">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
