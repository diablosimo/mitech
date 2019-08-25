@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Contactez-nous</h2>
                <ul class="breadcrumb">
                    <li>Acceuil</li>
                    <li>Contactez-nous</li>
                </ul>
            </div>
        </div>
    </div>


    <section id="main-container">
        <div class="container">

            <div class="row">
                <div id="map-wrapper" class="no-padding">
                    <div class="map" id="map">	{!! Mapper::render() !!}</div>
                </div>
            </div>
            <div class="gap-40"></div>
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        @include('partials.flash')
                    </div>

                    <form id="contact-form" action="{{url('contact')}}" method="post" enctype="multipart/form-data"
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
                            <div class="col-md-8">
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
                                <div class="form-group @if($errors->get('objet')) has-error @endif">
                                    <label>sujet</label>
                                    <input class="form-control" name="objet" id="objet" value="{{old('objet')}}"
                                           required>
                                    @if($errors->get('objet'))
                                        <li>{{$errors->first('objet')}}</li>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if($errors->get('message')) has-error @endif">
                            <label>Message </label>
                            <textarea class="form-control" name="message" id="message" rows="10"
                                      required>{{old('message')}}</textarea>
                            @if($errors->get('message'))
                                <li>{{$errors->first('message')}}</li>
                            @endif
                        </div>
                        <div class="text-right"><br>
                            <button class="btn btn-primary solid blank" type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="contact-info">
                        <h3>contact:</h3>
                        <p>
                            Vous avez des questions a nous poser, des suggestions a proposer, etc? <br>Alors écrivez-nous, nous vous répondrons rapidement.
                        </p>
                        <br>
                        <p><i class="fa fa-home info"></i> adresse: Avenue Allal El Fassi, immeuble Majorelle, appartement n°20, Marrakech.</p>
                        <p><i class="fa fa-phone info"></i> +(+212) 5 24 43 22 37</p>
                        <p><i class="fa fa-envelope-o info"></i><a href="mailto:info@mitech.ma"  target="_top">info@mitech.ma</a></p>
                        <p><i class="fa fa-globe info"></i> <a href="http://www.mitech.ma">www.mitech.ma</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

