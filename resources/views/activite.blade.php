@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>{{$activite->nom}}</h2>
                <ul class="breadcrumb">
                    @if($activite->categorie)
                        <li>Categorie</li>
                        <li>{{$activite->categorie->nom}}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <section id="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="portfolio-slider">
                        <div class="flexportfolio flexslider">
                            <ul class="slides">
                                @foreach($activite_images as $activite_image)
                                    <li><img src="{{asset('storage/activite/'.$activite_image->image)}}" alt=""></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="entry-content">
                            <div>{{$activite->description}}</div>
                        </div>
                        <div class="gap-30"></div>
                        @if(\App\Http\Controllers\ParticipationController::participe($activite->id)==true)
                            <div class="row">
                                <div class="text-left"><br>
                                    <form action="{{url('activites/participer')}}" method="post"> @csrf
                                        <button class="btn btn-primary solid blank" name="participate" value="{{$activite->id}}" type="submit">Participer</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget widget-tab">
                            <ul class="nav nav-tabs">
                                <li class=""><a href="#recent-tab" data-toggle="tab">Voir d'autre activités</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="popular-tab">
                                    <ul class="posts-list unstyled clearfix">
                                        @foreach($activites as $activite)
                                            <li>
                                                <div class="post-content">
                                                    <h4 class="entry-title"><a
                                                                href="{{url('activites/'.$activite->id)}}">{{$activite->nom}}</a>
                                                    </h4>
                                                    <p class="post-meta">
                                                        <span class="post-meta-author">categorie: {{$activite->categorie->nom}}</span>
                                                        <span class="post-meta">place disponible:</i>{{$activite->nb_place}}</a>
												</span>
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection