@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Devenir partenaire</h2>
                <ul class="breadcrumb">
                    <li>Acceuil</li>
                    <li>Rejoignez-nous</li>
                    <li>Devenir partenaire</li>
                </ul>
            </div>
        </div>
    </div>

    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        @include('partials.flash')
                    </div>

                    <form id="contact-form" action="{{url('partenaire')}}" method="post" enctype="multipart/form-data"
                          role="form">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('nom')) has-error @endif">
                                    <label>Nom</label>
                                    <input class="form-control" name="nom" id="nom" value="{{old('nom')}}" type="text"
                                           required>
                                    @if($errors->get('nom'))
                                        <li>{{$errors->first('nom')}}</li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('forme_juridique')) has-error @endif">
                                    <label>Forme juridique</label>
                                    <select class="form-control" name="forme_juridique" id="" required>
                                        <option value="" >--SELECT--</option>
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
                                    <input type="file" name="photo" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('nom_respo')) has-error @endif">
                                    <label>Nom du responsable</label>
                                    <input class="form-control" name="nom_respo" id="nom_respo"
                                           value="{{old('nom_respo')}}" type="text"
                                           required>
                                    @if($errors->get('nom_respo'))
                                        <li>{{$errors->first('nom_respo')}}</li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('prenom_respo')) has-error @endif">
                                    <label>Prenom du responsable</label>
                                    <input class="form-control" name="prenom_respo" id="prenom_respo"
                                           value="{{old('prenom_respo')}}"
                                           type="text" required>
                                    @if($errors->get('prenom_respo'))
                                        <li>{{$errors->first('prenom_respo')}}</li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('numtel_respo')) has-error @endif">
                                    <label>N° Telephone du responsable</label>
                                    <input class="form-control" name="numtel_respo" id="numtel_respo"
                                           value="{{old('numtel_respo')}}" type="tel" required>
                                    @if($errors->get('numtel_respo'))
                                        <li>{{$errors->first('numtel_respo')}}</li>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('email')) has-error @endif">
                                    <label>Email</label>
                                    <input class="form-control" name="email" id="email" value="{{old('email')}}"
                                           type="email" required>
                                    @if($errors->get('email'))
                                        <li>{{$errors->first('email')}}</li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('password')) has-error @endif">
                                    <label>Mot de passe</label>
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
                                    <input class="form-control" name="password_confirmation" id="password_confirmation"
                                           type="password" required>
                                    @if($errors->get('password_confirmation'))
                                        <li>{{$errors->first('password_confirmation')}}</li>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="cnd" required>
                                        <label class="form-check-label" for="gridCheck">
                                            j'ai lu et j'accepte <a href="{{url('termes_partenariat')}}" target="_blank">les termes et conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right"><br>
                            <button class="btn btn-primary solid blank" type="submit">Sabonner</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection

