@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Bureau MITech</h2>
                <ul class="breadcrumb">
                    <li>Qui somme nous</li>
                    <li>Bureau MITech</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading">
                    <span class="title-icon classic pull-left"><i class="fa fa-users"></i></span>
                    <h2 class="title classic">Memebres du bureau</h2>
                </div>
            </div>


            <div class="row text-center">
                @if(!$membres->isEmpty())
                    @foreach($membres as $membre)
                        <div class="col-md-3 col-sm-6">
                            <div class="team wow slideInLeft">
                                <div class="img-hexagon">
                                    <img src="{{asset('storage/adherent/'.$membre->adherent->user->photo)}}" alt="">
                                    <span class="img-top"></span>
                                    <span class="img-bottom"></span>
                                </div>
                                <div class="team-content">
                                    <h3>
                                        <a href="{{url('organisation#mb'.$membre->id)}}">{{$membre->adherent->nom." ". $membre->adherent->prenom}}</a>
                                    </h3>
                                    <p>{{$membre->fonction}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="gap-60"></div>
        </div>
    </section>
@endsection