<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>GraceAdmin</title>
        <!-- start: META -->
        <meta charset="utf-8" />
         <meta name="_token" content="{!! csrf_token() !!}" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="The new grace company custom management suite" name="description" />
        <meta content="phillip madsen" name="author" />


        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,100,200,300,500,600,700,800,900/" />

        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/font-awesome/css/font-awesome.min.css') !!}" />
        <linkk type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/bootstrap-toggle.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/fonts/clip-font.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/iCheck/skins/all.css') !!}" />

        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/sweetalert/dist/sweetalert.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/important.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main-responsive.min.css') !!}" />
        <link type="text/css" rel="stylesheet" media="print" href="{!! asset('/clip/assets/css/print.min.css') !!}" />
        <link type="text/css" rel="stylesheet" id="skin_color" href="{!! asset('/clip/assets/css/theme/light.min.css') !!}" />
        <link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/assets/css/bootstrap-toggle.min.css') !!}" rel="stylesheet" />





        <style>
            .panel-body{padding:15px!important;}
            .panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px;}
            .panel-heading{background-color:#F5F4F9;background-image:linear-gradient(to bottom,#F5F4F9 0%,#ECEAF3 100%);background-repeat:repeat-x;border-bottom:1px solid #CDCDCD;border-radius:6px 6px 0 0;box-shadow:0 1px 0 #FFFFFF inset;height:36px;padding-left:40px!important;position:relative;}
            .panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd;}
            .page-header { border-bottom:0 none; }
        </style>

        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<script src="{!! asset('/clip/assets/plugins/jQuery-lib/2.0.3/jquery.min.js') !!}"></script>
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="{!! asset('/clip/favicon.ico') !!}" />

@yield('topscripts')

    </head>
<body>
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="{{ url(getLang().'/admin/dashboard') }}"> GRACE<i class="clip-clip"></i>ADMIN </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                <ul class="nav navbar-right">
                    <!-- start: TO-DO DROPDOWN -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="/flags/{{ LaravelLocalization::getCurrentLocale() }}.png"> &nbsp; &nbsp;
                            <span class="username">{{ LaravelLocalization::getCurrentLocaleName() }}</span>

                        </a>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}" hreflang="{{$localeCode}}">
                                        <img alt="" src="/flags/{{$localeCode}}.png">&nbsp; &nbsp;{{ $properties['native'] }} </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>


                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                            <img src="{{ gravatarUrl(Sentinel::getUser()->email) }}" class="circle-img" alt="" style="max-width: 35px;">
                            <span class="username">{{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</span>
                            <i class="clip-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a href="{{ url(getLang() . '/admin/user/' . Sentinel::getUser()->id) }}"> <i class="clip-user-2"></i> &nbsp;My Profile </a> </li>
                            <li class="divider"></li>
                            <li> <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat"> <i class="clip-exit"></i> &nbsp;Log Out</a> </li>
                        </ul>
                    </li>
                    <!-- end: USER DROPDOWN -->
                </ul>
             {{-- @include('admin.layouts.partials.header.header') --}}
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- start: TOP NAVIGATION MENU -->

<!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">

@include('backend/layout/clip-sidebar')

            </div>
            <!-- start: PAGE -->
            <div class="main-content">

                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
@yield('pagetitle')
                <!-- start: PAGE CONTENT -->


@yield('content')
                <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->




        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2016 &copy; GraceAdmin by Phillip Madsen.
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <!-- start: RIGHT SIDEBAR -->

        {{-- @include('backend.layout.partials.rightsidebar') --}}

        <!-- end: RIGHT SIDEBAR -->
        @include('backend.layout.partials.event-management')

        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="{!! asset('/clip/assets/plugins/respond.min.js') !!}"></script>
        <script src="{!! asset('/clip/assets/plugins/excanvas.min.js') !!}"></script>
        <script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
         <script src="{!! asset('/clip/assets/plugins/jQuery-lib/2.0.3/jquery.min.js') !!}"></script>
        <!--<![endif]-->



        <script type="text/javascript" src="{!! asset('/clip/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/bootstrap-progressbar/bootstrap-progressbar.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/blockUI/jquery.blockUI.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/iCheck/icheck.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/jquery.cookie/jquery.cookie.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/sweetalert/dist/sweetalert.min.js') !!}"></script>

        <script src="{!! asset('/clip/bower_components/summernote/dist/summernote.min.js') !!}"></script>
        <script src="{!! asset('/clip/assets/js/bootstrap-toggle.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/js/min/main.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.tagsinput/src/jquery.tagsinput.js') !!}"></script>
        <script src="{!! asset('assets/js/bootstrap-table.js') !!}"></script>

@include('flash')
@include('debug')
        <!-- end: MAIN JAVASCRIPTS -->

@if (Request::url(getLang() . '/admin'))
    <script src="{!! asset('/clip/assets/js/min/index.min.js') !!}"></script>
@endif
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('bottomscripts')
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <script>
            $().ready(function() {
                Main.init();
                @yield('clipinline')
            });
        </script>
        @if (Request::url(getLang() . '/admin'))
        <script>
            $().ready(function() {
            $('.summernote').summernote({

                height: 300,
                minHeight: null,
                maxHeight: null,

              });
                Main.init();
                @yield('clipinline')
            });
        </script>




        @endif
    </body>
    <!-- end: BODY -->
</html>
