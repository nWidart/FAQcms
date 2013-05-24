<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>
            @section('title')
            Alys Frequently Asked Questions
            @show
        </title>
        <meta name="keywords" content="Alys, Faq" />
        <meta name="author" content="Nicolas Widart" />
        <meta name="description" content="FAQ d'alys" />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
        ================================================== -->
        {{ Basset::show('public-css.css') }}

        <style>
        @section('styles')
        @show
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
    </head>

    <body>
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
                        </ul>

                        <ul class="nav pull-right">
                            @if (Sentry::check())
                                @if(Sentry::getUser()->hasAccess('admin'))
                                    <li><a href="{{ URL::to('admin') }}">Admin Dashboard</a></li>
                                    <li class="divider-vertical"></li>
                                @endif
                                <li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
                                    <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ URL::to('account') }}">
                                        Welcome, {{ Sentry::getUser()->first_name }}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li{{ (Request::is('account/settings') ? ' class="active"' : '') }}><a href="{{ URL::to('account/settings') }}"><i class="icon-cog"></i> Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ URL::to('account/logout') }}"><i class="icon-off"></i> Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li {{ (Request::is('account/login') ? 'class="active"' : '') }}><a href="{{ URL::to('account/login') }}">Login</a></li>
                                <li {{ (Request::is('account/register') ? 'class="active"' : '') }}><a href="{{ URL::to('account/register') }}">Register</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- ./ nav-collapse -->
                </div>
            </div>
        </div>
        <!-- ./ navbar -->

        <!-- Container -->
        <div class="container">
            <!-- Notifications -->
            @include('site.layouts.notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>
        <!-- ./ container -->

        <!-- the following div is needed to make a sticky footer -->
        <div id="push"></div>
        </div>
        <!-- ./wrap -->


        <div id="footer">
          <div class="container">
            <p class="muted credit">Laravel 4 Starter Site on <a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site">Github</a>.</p>
          </div>
        </div>

        <!-- Javascripts
        ================================================== -->
        {{ Basset::show('public-js.js') }}
    </body>
</html>
