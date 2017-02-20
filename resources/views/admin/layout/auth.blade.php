<!DOCTYPE html>
<html lang="en">
<head>
    <html dir="rtl" lang="fa">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="تیم حروف نگار مجموعه ای خلاق است که تجربه دیجیتال نوینی را عرضه میکند">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>حروف نگار</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="../css/login.css" rel="stylesheet" type="text/css" />
        <link href="../css/homePage.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>--}}

    {{--<!-- Styles -->--}}
    {{--<link href="/css/app.css" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">

        <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-right: 54px !important;">
            <div class="">
                <div class="navbar-header">
                    <div class="back_img pull-left">
                        <a href="#" class="navbar-brand">
                            <img src="../images/horoof-negar-meshki.png" class="img_nav">
                        </a>
                    </div>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">


                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav pull-right navbar-right">
                        <li class="main_navbar" id="flip"><a href="#">جستجو&nbsp;<small><i class="fa fa-search fa-sm" aria-hidden="true"></i></small></a></li>
                        <li class="main_navbar"><a href=" {{ route('contactUs') }}">تماس با ما</a></li>
                        <li class="main_navbar"><a href="{{ route('aboutUs')}}">درباره ما</a></li>
                        <li class="main_navbar"><a href="{{ route('stores.index') }}">فروشگاه ها</a></li>
                        <li class="main_navbar"><a href="{{ route('homePage') }}">خانه</a></li>
                        <li class="enter_btn pull-right"><a class="navbar-brand pull-right" href="{{url('/admin/login')}}">ورود</a></li>
                    </ul>


                </div>
                <!-------------------------search form-------------------->
                <div id="panel">
                    <div class="col-md-10  col-xs-9 pull-right">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                </div>
                                <input class="form-control inputSearchNav" type="text" id="inputSearchNav" tabindex="1" placeholder="عبارت مورد جستجو را وارد کنید">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  col-xs-3 pull-left">
                        <button class="btn search_btn_nav pull-right">
                            <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
    {{--<nav class="navbar navbar-default navbar-static-top">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}

                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/admin') }}">--}}
                    {{--{{ config('app.name', 'Laravel Multi Auth Guard') }}: Admin--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--&nbsp;--}}
                {{--</ul>--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/admin/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/admin/register') }}">Register</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url('/admin/logout') }}"--}}
                                        {{--onclick="event.preventDefault();--}}
                                                 {{--document.getElementById('logout-form').submit();">--}}
                                        {{--Logout--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}

    @yield('content')

    <!-- Scripts -->
    {{--<script src="/js/app.js"></script>--}}
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
