<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Mitech-admin</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <style>
        [v-cloak] {
            display:none;
        }
    </style>
</head>
<body id="app">
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">

            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="{{asset('storage/admin/'.Auth::user()->photo)}}" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <a tabindex="0" class="dropdown-item" href="{{url('admin/compte')}}">Compte</a>
                                        <a  href="{{ route('logout') }}" tabindex="0" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Deconexion</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{\App\Http\Controllers\AdminController::getConnectedAdmin()->nom .' '.\App\Http\Controllers\AdminController::getConnectedAdmin()->prenom}}
                                </div>
                                <div class="widget-subheading">
                                    Administrateur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="result"></div>
    <div id="edit"></div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-culture"></i>
                                Activités
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{url('admin/activites/rest')}}">
                                        <i class="metismenu-icon"></i>
                                        Restituer
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/activites')}}">
                                        <i class="metismenu-icon">
                                        </i>Rechercher
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/activites/images')}}">
                                        <i class="metismenu-icon">
                                        </i>Images
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-world"></i>
                                Actualités
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{url('admin/actualites')}}">
                                        <i class="metismenu-icon">
                                        </i>Actualités
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="app-sidebar__heading">Adherents/partenaires</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-users"></i>
                                Adherents
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{url('admin/adherents')}}">
                                        <i class="metismenu-icon"></i>
                                        Rechercher
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/adherents/approuver')}}">
                                        <i class="metismenu-icon">
                                        </i>Approuver
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/membrebureau')}}">
                                        <i class="metismenu-icon">
                                        </i>Membres du bureau
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-users"></i>
                                Partenaires
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{url('admin/partenaires')}}">
                                        <i class="metismenu-icon"></i>
                                        Rechercher
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/partenaires/approuver')}}">
                                        <i class="metismenu-icon">
                                        </i>Approuver
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/formejuridique')}}">
                                        <i class="metismenu-icon">
                                        </i>Formes juridiques
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="app-sidebar__heading">Departements</li>
                        <li>
                            <a href="{{url('admin/departements')}}">
                                <i class="metismenu-icon pe-7s-network">
                                </i>Rechercher
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Message</li>
                        <li>
                            <a href="{{url('admin/messages')}}">
                                <i class="metismenu-icon pe-7s-mail">
                                </i>consulter
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Historique</li>
                        <li>
                            <a href="{{url('admin/revisions')}}">
                                <i class="metismenu-icon pe-7s-file">
                                </i>consulter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">

                            @yield('header')
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-10 offset-1">
                    @include('partials.flash')
                    </div>
                </div>


                @yield('content')
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset('js/admin/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

@yield('script')
</body>
</html>
