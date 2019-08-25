@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>{{$departement->nom}}</h2>
                <ul class="breadcrumb">
                    <li>Departements</li>
                    <li>{{$departement->nom}}</li>
                </ul>
            </div>
        </div>
    </div>

    <section id="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="post-content">
                        <div class="entry-content">
                            <div>{{$departement->description}}</div>
                        </div>
                        @if($departement->bureauMemeber)
                        <div class="about-author">
                            <div class="author-img pull-left ">
                                <img src="{{asset('storage/adherent/'.$departement->bureauMemeber->adherent->user->photo)}}" alt="" />
                            </div>
                            <div class="author-info">
                                <h3>{{$departement->bureauMemeber->adherent->nom.' '.$departement->bureauMemeber->adherent->prenom}}</h3>
                                <h3> <span>{{$departement->bureauMemeber->fonction}}</span></h3>
                                <div class="gap-20"></div>
                            </div>
                        </div>
                        @endif

                        <div class="gap-30"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget widget-tab">
                            <ul class="nav nav-tabs">
                                <li class=""><a href="#recent-tab" data-toggle="tab">activités</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="popular-tab">
                                    <ul class="posts-list unstyled clearfix">
                                        @foreach($departement->activites as $activite)
                                        <li>
                                            <div class="post-content">
                                                <h4 class="entry-title"><a href="{{url('activites/'.$activite->id)}}">{{$activite->nom}}</a>
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