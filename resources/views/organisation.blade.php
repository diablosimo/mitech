@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Bureau MITech</h2>
                <ul class="breadcrumb">
                    <li>Qui sommes nous?</li>
                    <li>Organisation</li>
                </ul>
            </div>
        </div>
    </div>


    <section id="main-container">
        <div class="container">
            @foreach($membres as $membre)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div id="{{'mb'.$membre->id}}" class="team team-list-square wow slideInLeft">
                        <div class="img-square ">
                            <img src="{{asset('storage/adherent/'.$membre->adherent->user->photo)}}"  alt="">
                        </div>
                        <div class="team-content">
                            <h3>{{$membre->adherent->nom." ". $membre->adherent->prenom}}</h3>
                            <p>{{$membre->fonction}}</p>
                            <p class="desc">
                                {{$membre->adherent->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="gap-60"></div>
        </div>
    </section>
@endsection