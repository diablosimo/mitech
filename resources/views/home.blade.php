@extends('layouts.master')

@section('content')

    <section id="home" class="no-padding">
        <div id="main-slide" class="carousel slide" data-ride="carousel">
            <div class="overlay"></div>
            <ol class="carousel-indicators">
                @foreach($actualites as $actualite)
                    <li data-target="#main-slide" data-slide-to="{{$loop->index}}"
                        class="{{$loop->first?'active':''}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($actualites as $actualite)
                    <div class="item {{$loop->first?'active':''}}">
                        <img class="img-responsive" src="{{asset('storage/actualite/'.$actualite->photo)}}"
                             alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated7">
                                    {{$actualite->titre}}
                                </h2>
                                <h3 class="animated8">
                                    {{$actualite->sous_titre}}
                                </h3>
                                <p class="animated6"><a href="{{url('actualite/'.$actualite->id)}}"
                                                        class="slider btn btn-primary white">details...</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
    </section>
    <h1>Acceuil</h1>
    <section id="clients" class="clients">
        @if(\App\Http\Controllers\PartenaireController::loadApprouve())
            <div class="container">
                <h3>Nos partenaires</h3>
                <div class="row wow fadeInLeft">
                    <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
                        @foreach(\App\Http\Controllers\PartenaireController::loadApprouve() as $partenaire)
                            <figure class="item client_logo">
                                <a href="">
                                    <img src="{{asset('storage/partenaire/'.$partenaire->user->photo)}}"
                                         alt="{{$partenaire->nom}}">
                                </a>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection