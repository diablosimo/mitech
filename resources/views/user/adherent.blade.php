@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>{{$adherent->nom}} {{$adherent->prenom}}</h2>
            </div>
        </div>
    </div>

    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-border">Les informations personnelles</h3>
                    <div class="panel-group" id="accordionA">
                        <div class="row">
                            @include('partials.flash')
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionA, #accordionB"
                                       href="#collapseThree"> Mes activités</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul class="unstyled arrow">
                                        @foreach($adherent->user->activites as $activite)
                                            <li><a href="{{url('activites/'.$activite->id)}}">{{$activite->nom}}</a>
                                                ({{$activite->categorie->nom}})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordionA, #accordionB"
                                       href="#collapseFour">Compte</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <ul class="unstyled arrow">
                                        <form id="user-form" action="{{url('adherent/editInfo')}}" method="post"
                                              role="form" enctype="multipart/form-data">
                                            {{method_field('PUT')}}
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group @if($errors->get('numtel')) has-error @endif">
                                                        <label>N° Telephone</label>
                                                        <input class="form-control" name="numtel" id="numtel"
                                                               value="{{$adherent->num_tel}}" type="tel">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">image</label>
                                                        <input type="file" name="photo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group @if($errors->get('description')) has-error @endif">
                                                        <label>Description </label>
                                                        <textarea class="form-control" name="description" id="description"
                                                                  rows="10"
                                                                  required>{{$adherent->description}}</textarea>
                                                        @if($errors->get('description'))
                                                            <li>{{$errors->first('description')}}</li>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-right"><br>
                                                    <button class="btn btn-primary solid blank" type="submit">Modifier
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordionA, #accordionB"
                                       href="#collapseOne">Mot de passe</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="unstyled arrow">
                                        <form id="contact-form" action="{{url('editPassword')}}" method="post"
                                              role="form">
                                            {{method_field('PUT')}}
                                            {{csrf_field()}}
                                            <div class="col-md-4">
                                                <div class="form-group @if($errors->get('old_password')) has-error @endif">
                                                    <label>Ancien mot de passe</label>
                                                    <input class="form-control" name="old_password" id="old_password"
                                                           type="password" required>
                                                    @if($errors->get('old_password'))
                                                        <li>{{$errors->first('old_password')}}</li>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group @if($errors->get('password')) has-error @endif">
                                                    <label>Nouveau mot de passe</label>
                                                    <input class="form-control" name="password" id="password"
                                                           type="password" required>
                                                    @if($errors->get('password'))
                                                        <li>{{$errors->first('password')}}</li>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group @if($errors->get('cpassword')) has-error @endif">
                                                    <label>Confirmer mot de passe</label>
                                                    <input class="form-control" name="password_confirmation"
                                                           id="password_confirmation"
                                                           type="password" required>
                                                    @if($errors->get('password_confirmation'))
                                                        <li>{{$errors->first('password_confirmation')}}</li>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-right"><br>
                                                <button class="btn btn-primary solid blank" type="submit">Modifier
                                                </button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="gap-40"></div>

                </div>
            </div>
        </div>
    </section>


@endsection