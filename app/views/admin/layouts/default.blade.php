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
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="{{{ asset('assets/css/wysihtml5/bootstrap-wysihtml5-0.0.2.css') }}}" rel="stylesheet">
        <link href="{{{ asset('assets/css/bootstrap/bootplus.css') }}}" rel="stylesheet">
        <link href="{{{ asset('assets/css/bootstrap/bootplus-responsive.css') }}}" rel="stylesheet">
        <link href="{{{ asset('assets/css/tablecloth.css') }}}" rel="stylesheet">

        <link href="{{{ asset('assets/css/wysihtml5/prettify.css') }}}" rel="stylesheet">

        <link href="{{{ asset('assets/css/style.css') }}}" rel="stylesheet">

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
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li {{ (Request::is('admin/questions*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/questions') }}}">Questions</a></li>
                            <li {{ (Request::is('admin/categories*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/categories') }}}">Categories</a></li>
                            <li class="dropdown{{ (Request::is('admin/users*|admin/groups*') ? ' active' : '') }}">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('admin/users') }}">
                                    <i class="icon-user icon-white"></i> Users <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{ URL::to('admin/users') }}"><i class="icon-user"></i> Users</a></li>
                                    <li{{ (Request::is('admin/groups*') ? ' class="active"' : '') }}><a href="{{ URL::to('admin/groups') }}"><i class="icon-user"></i> Groups</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav pull-right">
                            <li><a href="{{ URL::to('/') }}">View Homepage</a></li>
                            <li class="divider-vertical"></li>
                            <li>
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="icon-user"></i> admin <i class="icon-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::to('account/logout')}}"><i class="icon-share"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- ./ nav-collapse -->
                </div>
            </div>
        </div>
        <!-- ./ navbar -->

        <!-- Container -->
        <div class="container-fluid">
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
          <div class="container-fluid">
            <p class="muted credit">Frequently Asked Questions | Alys</p>
          </div>
        </div>

        <!-- Javascripts
        ================================================== -->
        <script src="{{ asset( 'assets/js/jquery-1.9.1.min.js' )}}"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{{ asset('assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js') }}}"></script>
        <script src="{{{ asset('assets/js/bootstrap/bootstrap.js') }}}"></script>
        <script src="{{{ asset('assets/js/wysihtml5/bootstrap-wysihtml5-0.0.2.js') }}}"></script>


        <script src="{{{ asset('assets/js/prettify.js') }}}"></script>
        <script src="{{{ asset('assets/js/jquery.metadata.js') }}}"></script>
        <script src="{{{ asset('assets/js/jquery.tablecloth.js') }}}"></script>
        <script src="{{{ asset('assets/js/jquery.tablesorter.min.js') }}}"></script>
        <script src="{{{ asset('assets/js/site.js') }}}"></script>
        <script>
            $(document).ready(function() {

            });

        </script>
        @section('scripts')
        @show
    </body>
</html>
