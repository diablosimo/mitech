@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Actualité</h2>
                <ul class="breadcrumb">
                    <li>Acceuil</li>
                    <li>Actualités</li>
                    <li><a href="#"> Actualité</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="post-content">
                        <div class="post-image-wrapper">
                            <img src="{{asset('storage/actualite/'.$actualite->photo)}}" class="img-responsive" alt=""/>
                            <span class="blog-date"><a href="#"> {{$actualite->date_publication}}</a></span>
                        </div>
                        <div class="post-header clearfix">
                            <h2 class="post-title">
                                <a href="blog-item.html">{{$actualite->titre}}</a>
                            </h2>
                        </div>
                        <div class="entry-content">
                            <p>{{$actualite->sous_titre}}</p>
                            <pre>{{$actualite->article}}</pre>
                        </div>
                        <div class="gap-30"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget widget-title">
                            <h3 class="widget-title">Actualités recentes</h3>
                        </div>
                        <div class="widget widget-tab">
                            <div class="tab-content">
                                <div class="tab-pane active" id="recent-tab">
                                    <ul class="posts-list unstyled clearfix">
                                        @foreach($recentActs as $ra)
                                            <li>
                                                <div class="posts-thumb pull-left">
                                                    <a href="{{url('actualite/'.$ra->id)}}">
                                                        <img alt="img" src="{{asset('storage/actualite/'.$ra->photo)}}">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h4 class="entry-title">
                                                        <a href="{{url('actualite/'.$ra->id)}}">{{$ra->titre}}</a>
                                                    </h4>

                                                    <span class="post-meta-date">
                                                            <p><i class="fa fa-clock-o"></i>{{$ra->date_publication}}</p>
                                                        </span>
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