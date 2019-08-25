@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>{{$partenaire->nom}}
                    @if($partenaire->formeJuridique)
                        ({{$partenaire->formeJuridique->nom}})
                    @endif
                </h2>
            </div>
        </div>
    </div>

    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-border">Nos informations</h3>
                    <div class="panel-group" id="accordionA">
                        <div class="row">
                            @include('partials.flash')
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionA, #accordionB"
                                       href="#collapseThree"> Nos activités</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul class="unstyled arrow">
                                        @foreach($partenaire->user->activites as $activite)
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
                                       href="#collapseTwo"> Compte</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="unstyled arrow">
                                        <div class="row">
                                            <div class="team team-list-square col-md-6">
                                                <div class="img-fluid">
                                                    <img src="{{asset('storage/partenaire/'.$partenaire->user->photo)}}"
                                                         alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-">
                                            <form action="{{url('partenaire/editInfo')}}" method="post"
                                                  role="form" enctype="multipart/form-data">
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                                                <div class="col-md-4">
                                                    <div class="form-group @if($errors->get('nom_respo')) has-error @endif">
                                                        <label>Nom du responsable</label>
                                                        <input class="form-control" name="nom_respo" id="nom_respo"
                                                               value="{{$partenaire->nom_respo}}" type="text"
                                                               required>
                                                        @if($errors->get('nom_respo'))
                                                            <li>{{$errors->first('nom_respo')}}</li>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group @if($errors->get('prenom_respo')) has-error @endif">
                                                        <label>Prenom du responsable</label>
                                                        <input class="form-control" name="prenom_respo"
                                                               id="prenom_respo"
                                                               value="{{$partenaire->prenom_respo}}"
                                                               type="text" required>
                                                        @if($errors->get('prenom_respo'))
                                                            <li>{{$errors->first('prenom_respo')}}</li>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group @if($errors->get('numtel_respo')) has-error @endif">
                                                        <label>N° Telephone du responsable</label>
                                                        <input class="form-control" name="numtel_respo"
                                                               id="numtel_respo"
                                                               value="{{$partenaire->numtel_respo}}" type="tel"
                                                               required>
                                                        @if($errors->get('numtel_respo'))
                                                            <li>{{$errors->first('numtel_respo')}}</li>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group @if($errors->get('forme_juridique')) has-error @endif">
                                                        <label>Forme juridique</label>
                                                        <select class="form-control" name="forme_juridique" id="">
                                                            <option value="" selected>--SELECT--</option>
                                                            @foreach(\App\Http\Controllers\FormeJuridiqueController::findAll() as $formeJuridique)
                                                                <option value="{{$formeJuridique->id}}">{{$formeJuridique->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->get('forme_juridique'))
                                                            <li>{{$errors->first('forme_juridique')}}</li>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group @if($errors->get('photo')) has-error @endif">
                                                        <label for="">Logo</label>
                                                        <input type="file" name="photo" class="form-control">
                                                    </div>
                                                </div>


                                                <div class="text-right"><br>
                                                    <button class="btn btn-primary solid blank" type="submit">Modifier
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


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
                                                <div class="form-group @if($errors->get('password')) has-error @endif">
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
                                                <div class="form-group @if($errors->get('password_confirmation')) has-error @endif">
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