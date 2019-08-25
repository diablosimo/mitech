<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MITech</title>
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Favicons-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <!-- CSS================================================== -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}">
    <link id="style-switch" href="{{ asset('css/presets/preset3.css')}}" media="screen" rel="stylesheet" type="text/css">
</head>
<body>

<div class="body-inner">
    <header id="header" class="navbar-fixed-top header4" role="banner">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="{{url('home')}}">
                            <img class="img-responsive" src="{{asset('logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse clearfix" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('home')}}">ACCEUIL</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                QUI SOMMES NOUS?
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="{{url('bureau')}}">Bureau MITech</a></li>
                                    <li><a href="{{url('organisation')}}">Organisation</a></li>
                                    <li><a href="{{url('statut')}}">Statut</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                DEPARTEMENTS
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach(\App\Http\Controllers\DepartementController::findAll() as $departement)
                                        <li><a href="{{url('departement/'.$departement->id)}}">{{$departement->nom}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                REJOIGNEZ-NOUS
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    @if(Auth::user())
                                        @if(\App\User::isClient())
                                            <li><a href="{{url('compte')}}">Mon compte</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}" tabindex="0" class="dropdown-item"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Deconexion</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        @else
                                            <li><a href="{{url('partenaire')}}">Devenir partennaire</a></li>
                                            <li><a href="{{url('adherent')}}">Devenir adhérent</a></li>
                                            <li><a href="{{route('login')}}">Se connecter</a></li>
                                        @endif
                                    @else
                                        <li><a href="{{url('partenaire')}}">Devenir partennaire</a></li>
                                        <li><a href="{{url('adherent')}}">Devenir adhérent</a></li>
                                        <li><a href="{{route('login')}}">Se connecter</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{url('contact')}}">CONTACTEZ NOUS</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

</div>
</body>
<footer>
    <section id="copyright" class="copyright angle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>MITech</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="copyright-info">
                        <p>&copy;2019 All Rights Reserved | Powered by <strong>ITICSYS</strong></p></div>
                </div>
            </div>
            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
                <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
            </div>
        </div>
    </section>
    <!-- Javascript Files
        ================================================== -->
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</footer>

</html>