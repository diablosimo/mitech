@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Devenir adherent</h2>
                <ul class="breadcrumb">
                    <li>Acceuil</li>
                    <li>Rejoignez-nous</li>
                    <li>Devenir adherent</li>
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

                    <form id="contact-form" action="{{url('adherent')}}" method="post" enctype="multipart/form-data"
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
                                <div class="form-group @if($errors->get('prenom')) has-error @endif">
                                    <label>Prenom</label>
                                    <input class="form-control" name="prenom" id="prenom" value="{{old('prenom')}}"
                                           type="text" required>
                                    @if($errors->get('prenom'))
                                        <li>{{$errors->first('prenom')}}</li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->get('numtel')) has-error @endif">
                                    <label>N° Telephone</label>
                                    <input class="form-control" name="numtel" id="numtel"
                                           value="{{old('numtel')}}" type="tel" required>
                                    @if($errors->get('numtel'))
                                        <li>{{$errors->first('numtel')}}</li>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" id="email"
                                           @if($errors->get('email')) has-error @endif
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
                            <div class="form-group col-md-8 @if($errors->get('description')) has-error @endif">
                                <label>Description </label>
                                <textarea class="form-control" name="description" id="description" rows="10"
                                          required>{{old('description')}}</textarea>
                                @if($errors->get('description'))
                                    <li>{{$errors->first('description')}}</li>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">image</label>
                                <input type="file" name="photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="cnd" required>
                                        <label class="form-check-label" for="gridCheck">
                                            j'ai lu et j'accepte <a href="{{url('termes_adhesion')}}" target="_blank">les termes et conditions</a>
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

